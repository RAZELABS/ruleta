@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">kioscos</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                                                <form action="{{ route('admin.kiosco.import') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="csv_file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" aria-placeholder="Ingrese archivo">
                                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Importar</button>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @push('styles')
    <style>
        .loading-spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
        }
    </style>
    @endpush
    @push('scripts')
  
        <script>
            var routeConfigurations = {
                'TABLE_1': {
                    'botones': 'Bfrtip',
                    'colFechaSimple': [0],
                    // 'ordenar': [0, "asc"],
                },
            }
        </script>
    @endpush
    @push('scripts')
        <script src="{{ asset('plugins/datatables/datatables-config.js') }}"></script>
    @endpush
