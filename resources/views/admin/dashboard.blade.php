@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row counters counters-text-1 mb-2">
        <div class="col-sm-12 col-lg-4 mb-4 mb-lg-0">
            <div class="counter-1">
                <strong id="totalParticipantes"><span class="text-counter-1">{{ $totalParticipantes }}</span></strong>
                <label>Total participantes</label>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="counter-1">
                <strong id="totalGanadores"><span class="text-counter-1">{{ $totalGanadores }}</span></strong>
                <label>Total Ganadores</label>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="counter-1">
                <strong id="totalPerdedores"><span class="text-counter-1">{{ $totalPerdedores }}</span></strong>
                <label>Total Perdedores</label>
            </div>
        </div>
    </div>
    <div class="row counters counters-text">
        <div class="col-sm-12 col-lg-4 mb-4 mb-lg-0">
            <div class="counter py-3">
                <strong id="totalParticipantesDia">{{ $totalGanadoresDia + $totalPerdedoresDia }}</strong>
                <label>Participantes del día</label>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="counter py-3">
                <strong id="totalGanadoresDia">{{ $totalGanadoresDia }}</strong>
                <label>Ganadores del día</label>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
            <div class="counter py-3">
                <strong id="totalPerdedoresDia">{{ $totalPerdedoresDia }}</strong>
                <label>Perdedores del día</label>
            </div>
        </div>
    </div>
</div>
@if ($totalParticipantes >=1)
<div class="container">
    <div class="row h-100">
        <div class="col-md-12">
            <div id="winnersChart" style="width: 100%; height: 1200px;"></div>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts-head')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        $.ajax({
            url: '{{ route("admin.dashboard.data") }}',
            method: 'GET',
            success: function(response) {
                var data = google.visualization.arrayToDataTable([
                    ['Tienda', 'Ganadores Actuales', 'Ganadores Esperados'],
                    ...response.stores.map((store, index) => {
                        return [store, response.winnersPerStore[index], response.expectedWinnersPerStore[index]];
                    })
                ]);

                var options = {
    title: 'Ganadores vs Ganadores Esperados por Tienda (Hoy)',
    titleTextStyle: {
        fontSize: 18,
        bold: true,
        color: '#343E49'
    },
    bars: 'vertical',
    isStacked: true,
    groupHeight: '100%', // Aumenta el espacio entre grupos de barras
    bar: {
        height: 55, // Reduce la altura de las barras
        width: 25   // Puedes ajustar el ancho de las barras
    },
    hAxis: {
        title: 'Cantidad',
        minValue: 0,
        textStyle: {
            fontSize: 14 // Reduce el tamaño de la fuente de los ejes
        }
    },
    vAxis: {
        title: 'Tienda',
        textStyle: {
            fontSize: 14,
            color: '#fff'// Evita que el texto se desborde
        },
        slantedText: false, // Ensure text is not slanted
        textPosition: 'in' // Ensure text is inside the chart area
    },
    legend: { position: 'bottom' }, // Place the legend at the bottom
    colors: ['#AAD500', '#343E49'],
    width: '100%',
    height: '100%', // Ajusta la altura total del gráfico
    backgroundColor: 'transparent',
    chartArea: {
        width: '80%', // Deja más espacio para los ejes
        height: '80%'
    }
};
                var chart = new google.visualization.BarChart(document.getElementById('winnersChart'));
                chart.draw(data, options);

                // Update counters
                $('#totalParticipantes').text(response.totalParticipantes);
                $('#totalGanadores').text(response.totalGanadores);
                $('#totalPerdedores').text(response.totalPerdedores);
                $('#totalParticipantesDia').text(response.totalGanadoresDia + response.totalPerdedoresDia);
                $('#totalGanadoresDia').text(response.totalGanadoresDia);
                $('#totalPerdedoresDia').text(response.totalPerdedoresDia);
            }
        });
    }

    setInterval(drawChart, 10000); // Update every 10 seconds
</script>
@endpush
