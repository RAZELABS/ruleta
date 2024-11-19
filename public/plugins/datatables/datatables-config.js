$(function () {
    var tableIds = Object.keys(routeConfigurations);
    tableIds.forEach(function (tableId) {
        var tableConfig = routeConfigurations[tableId];
        if (tableConfig) {
            var columnDefs = [];
            var grupos = tableConfig.agrupar || [];
            var dataSrcArray = [];
            var formatos = tableConfig.formatos || [];
            var dataToInt = tableConfig.dataToInt || [];
            // OCULTAR CAMPOS
            if (tableConfig.ocultar !== null) {
                columnDefs.push({
                    targets: tableConfig.ocultar,
                    visible: false,
                });
            }
            // convertir CAMPOS a enteros
            dataToInt.forEach(function (toInt) {
                columnDefs.push({
                    targets: toInt.target, // Índice de la columna "id"
                    type: "num", // Usar tipo numérico para la ordenación
                    orderData: [toInt.target - 1],
                    render: function (data, type, row) {
                        if (type === "display") {
                            // Formatear la visualización de los datos si es necesario
                            return data;
                        }
                        return data.replace(/^\D+/g, "") * 1; // Eliminar caracteres no numéricos y convertir a número
                    },
                });
            });
            // Prioridad responsiva
            if (tableConfig.resPriority !== null) {
                columnDefs.push(
                    {
                        responsivePriority: 1,
                        targets: tableConfig.resPriority,
                    },
                    {
                        responsivePriority: 2,
                        targets: "_all",
                    },
                );
            }
            // Formato y terminacion de los campos
            formatos.forEach(function (formato) {
                if (formato.simbolo && Array.isArray(formato.targets)) {
                    columnDefs.push({
                        targets: formato.targets,
                        render: $.fn.dataTable.render.number(
                            "",
                            ".",
                            0,
                            "",
                            formato.simbolo,
                        ),
                    });
                }
                if (
                    formato.simbolo_decimal &&
                    Array.isArray(formato.targets_decimal)
                ) {
                    columnDefs.push({
                        targets: formato.targets_decimal,
                        render: $.fn.dataTable.render.number(
                            "",
                            ".",
                            2,
                            "",
                            formato.simbolo_decimal,
                        ),
                    });
                }
            });
            //formatear fechas
            if (tableConfig.colFecha !== null) {
                columnDefs.push({
                    targets: tableConfig.colFecha,
                    type: "date",
                    render: function (data) {
                        if (data && !isNaN(Date.parse(data))) {
                            var date = new Date(data);
                            return date.toLocaleString("es-ES", {
                                day: "2-digit",
                                month: "short",
                                year: "numeric",
                                hour: "2-digit",
                                minute: "2-digit",
                                second: "2-digit",
                            });
                        } else {
                            return "";
                        }
                    },
                });
            }
            if (tableConfig.colFechaSimple !== null) {
                columnDefs.push({
                    targets: tableConfig.colFechaSimple,
                    type: "date",
                    render: function (data) {
                        if (data && !isNaN(Date.parse(data))) {
                            var date = new Date(data);
                            date.setDate(date.getDate());
                            return date.toLocaleString("es-ES", {
                                day: "2-digit",
                                month: "short",
                                year: "numeric",
                            });
                        } else {
                            return "";
                        }
                    },
                });
            }
            // Agrupar columnas
            grupos.forEach(function (grupo) {
                if (grupo.columna !== undefined) {
                    dataSrcArray.push(grupo.columna);
                }
            });
            //script principal
            var table = $("#" + tableId).DataTable({
                dom: tableConfig.botones ?? "",
                autoWidth: tableConfig.autoWidth ?? true,
                responsive: tableConfig.responsive ?? true,
                paging: tableConfig.paginacion ?? true,
                pageLength: tableConfig.nroFilas ?? 30,
                order: tableConfig.ordenar ?? false,
                columnDefs: columnDefs,
                rowGroup: {
                    enable: grupos.length > 0,
                    dataSrc: dataSrcArray,
                },
                createdRow: function (row, data, dataIndex) {
                    // Iterar sobre todas las celdas de la fila
                    $("td", row).each(function (index, el) {
                        // Verificar si la celda está vacía
                        if ($(this).text() === "") {
                            $(this).css("background-color", "#f2f2f2");
                            $(this).css("color", "#ddd");
                            $(this).text("No aplica");
                        }
                    });
                },
                buttons: [
                    {
                        extend: "excel",
                        text: "Exportar a excel",
                        titleAttr: "excel",
                        className: "btn btn-tablas btn-sm",
                    },
                    {
                        extend: "print",
                        text: "Imprimir",
                        titleAttr: "Imprimir",
                        className: "btn btn-tablas btn-sm",
                    },
                    {
                        extend: "pdf",
                        text: "PDF",
                        titleAttr: "Generar PDF",
                        className: "btn btn-tablas btn-sm",
                    },
                    {
                        extend: "copy",
                        text: "Copiar",
                        titleAttr: "copiar",
                        className: "btn btn-tablas btn-sm",
                    },
                    {
                        extend: "colvis",
                        text: "Mostrar/Ocultar Columnas",
                        className: "btn btn-tablas btn-sm",
                    }
                ],
                language: {
                    url: "http://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json",
                },
                // SUMAR COLUMNAS
                footerCallback: function (row, data, start, end, display) {
                    var api = this.api();
                    var sumatoriaColumna = function (index) {
                        return api
                            .column(index, {
                                page: "current",
                            })
                            .data()
                            .reduce(function (a, b) {
                                return parseFloat(a) + parseFloat(b);
                            }, 0);
                    };
                    formatos.forEach(function (sumarCol) {
                        if (
                            sumarCol.sumar == true ||
                            sumarCol.sumar_decimal == true
                        ) {
                            var columnasSumar =
                                sumarCol.targets ?? sumarCol.targets_decimal;
                            var columnasSimbolo =
                                sumarCol.simbolo ?? sumarCol.simbolo_decimal;
                            columnasSumar.forEach(function (columnIndex) {
                                var sumatoria = sumatoriaColumna(columnIndex);
                                if (sumarCol.targets) {
                                    var total = sumatoria + columnasSimbolo;
                                }
                                if (sumarCol.targets_decimal) {
                                    var total =
                                        sumatoria.toFixed(2) + columnasSimbolo;
                                }
                                $(api.column(columnIndex).footer())
                                    .addClass(
                                        "bg-warning text-dark text-nowrap",
                                    )
                                    .html(total);
                            });
                        }
                    });
                },
            });
            new $.fn.dataTable.FixedHeader(table);
        }
    });
});
