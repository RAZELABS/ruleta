@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Relación de jugadas realizadas</h1>
                    </div>
                </div>
            </div>
            <div class="p-2 col-12 col-md-10 offset-md-1">
                <div class="p-4">
                    <table class="table table-striped" id="TABLE_1">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Hora</th>
                                <th scope="col">Tienda</th>
                                <th scope="col">Tipo documento</th>
                                <th scope="col">Nro documento</th>
                                <th scope="col">Resultado</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles as $detalle)
                                <tr class="">
                                    <td scope="row">{{ $detalle->id }}</td>
                                    <td scope="row">{{ $detalle->fecha }}</td>
                                    <td scope="row">{{ $detalle->hora }}</td>
                                    <td scope="row">{{ $detalle->tienda->nombre }}</td>
                                    <td scope="row">{{ $detalle->documento->descripcion }}</td>
                                    <td scope="row">{{ $detalle->nro_documento }}</td>
                                    <td scope="row">{{ $detalle->parametro->descripcion }}</td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            @if ($detalle->estado == 1)
                                                <form class=""
                                                    action="{{ route('admin.detalle.disabled', [$detalle->id]) }}" @csrf
                                                    @method('GET') <input type="hidden" name="cambioEstado"
                                                    value="true">
                                                    <button type="submit" id="btn-submit"
                                                        class="btn btn-falabella-2 btn-sm ">
                                                        <i
                                                            class="@if ($detalle->estado == 1) fa-solid fa-ban @else fa-solid fa-check @endif">
                                                        </i> Deshabilitar
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.detalle.disabled', [$detalle->id]) }}" @csrf
                                                    @method('GET') <input type="hidden" name="cambioEstado"
                                                    value="true">
                                                    <button type="submit" id="btn-submit"
                                                        class="btn btn-falabella-2 btn-sm ">
                                                        <i
                                                            class="@if ($detalle->estado == 2) fa-solid fa-check @else fa-solid fa-ban @endif">
                                                        </i> Habilitar
                                                    </button>
                                                </form>
                                            @endif
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
