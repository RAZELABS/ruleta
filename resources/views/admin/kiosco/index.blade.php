@extends('admin.layouts.app')

@section('content')
<div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-12 offset-md-1">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">kioscos</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                                                <form action="{{ route('admin.kiosco.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="csv_file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" aria-placeholder="Ingrese archivo">
                                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Importar</button>
                              </div>


                        </form>
                    </div>
                </div>
            </div>
            <div class="p-2 col-12 col-md-10 offset-md-1">
                <div class="p-4 position-relative">
                    <div class="loading-spinner">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <table class="table table-striped" id="TABLE_1">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Tipo Doc</th>
                                <th>Nro Doc</th>
                                <th>Código Tienda</th>
                                <th>Orden Compra</th>
                                <th>Monto</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kioscos as $kiosco)
                                <tr>
                                    <td>{{$kiosco->fecha }}</td>
                                    <td>{{ $kiosco->hora }}</td>
                                    <td>{{ $kiosco->tipo_documento }}</td>
                                    <td>{{ $kiosco->nro_documento }}</td>
                                    <td>{{ $kiosco->codigo_tienda }}</td>
                                    <td>{{ $kiosco->orden_compra }}</td>
                                    <td>{{ $kiosco->monto }}</td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            <a href="{{ route('admin.kiosco.edit', $kiosco->id) }}"
                                                class="btn btn-falabella btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a href="{{ route('admin.kiosco.destroy', $kiosco->id) }}"
                                                class="btn btn-falabella btn-sm">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')

    <script>
                // Table initialization code here
                var routeConfigurations = {
                    'TABLE_1': {
                        'botones': 'Bfrtip',
                        'autoWidth': false,
                        'numerical': false,
                        'ordering': true,
                        'colFecha': [0],
                        'columnDefs': [
                {
                    // Target columns that need leading zeros (tipo_documento, nro_documento, codigo_tienda, orden_compra)
                    'targets': [2, 3, 4, 5,6],
                    'render': function(data, type, row) {
                        if (type === 'display') {
                            // Convert to string and preserve leading zeros
                            return data.toString();
                        }
                        return data;
                    },
                    // Prevent automatic type detection
                    'type': 'string'
                }
            ]
                    },
                }

    </script>
    @endpush
    @push('scripts')

    <script src="{{ asset('plugins/datatables/datatables-config.js') }}"></script>
    @endpush
