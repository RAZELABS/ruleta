@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Importar jugadas en kioscos</h1>
                    </div>
                </div>
            </div>
            <div class="p-2 col-12 col-md-10 offset-md-1">
                <div class="p-4">
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
                                <th>Estado</th>
                                <th>Archivo Original</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kioscos as $kiosco)
                                <tr>
                                    <td>{{ $kiosco->fecha }}</td>
                                    <td>{{ $kiosco->hora }}</td>
                                    <td>{{ $kiosco->tipo_documento }}</td>
                                    <td>{{ $kiosco->nro_documento }}</td>
                                    <td>{{ $kiosco->codigo_tienda }}</td>
                                    <td>{{ $kiosco->orden_compra }}</td>
                                    <td>{{ $kiosco->monto }}</td>
                                    <td>{{ $kiosco->estado }}</td>
                                    <td>
                                        @if ($kiosco->csv_filename)
                                            <a href="{{ route('kiosco.download', $kiosco->csv_filename) }}">Descargar
                                                CSV</a>
                                        @endif
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
            var routeConfigurations = {
                'TABLE_1': {
                    'botones': 'Bfrtip',
                    // 'ordenar': [0, "asc"],
                },
            }
        </script>
    @endpush
    @push('scripts')
        <script src="{{ asset('plugins/datatables/datatables-config.js') }}"></script>
    @endpush