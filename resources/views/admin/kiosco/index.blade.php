@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-12 offset-md-1">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Importar compras en kioscos</h1>
                    </div>
                </div>
            </div>
            <div class="p-2 col-12 col-md-12 offset-md-1">
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
                                <th>Accion</th>
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
