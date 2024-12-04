@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Premios por tienda</h1>
                    </div>
                </div>
            </div>
            <div class="p-2 col-12 col-md-8 offset-md-2">
                <div class="p-4">
                    <table class="table table-striped" id="TABLE_1">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tienda</th>
                                <th scope="col">Premio</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tiendapremios as $tiendapremio)
                                <tr class="">
                                    <td scope="row">{{ $tiendapremio->id }}</td>
                                    <td scope="row">{{ $tiendapremio->tiendas->nombre }}</td>
                                    <td scope="row">{{ $tiendapremio->premios->descripcion }}</td>
                                    {{-- <td>
                                        <div class="btn-group btn-group-toggle">
                                                <a href="{{ route('admin.tiendapremio.edit', $tiendapremio->id) }}"
                                                    class="btn btn-falabella-2 btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                        </div>
                                    </td> --}}

                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            @if ($tiendapremio->estado == 1)
                                                <a href="{{ route('admin.tiendapremio.edit', $tiendapremio->id) }}"
                                                    class="btn btn-falabella btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form class=""
                                                    action="{{ route('admin.tiendapremio.disabled', [$tiendapremio->id]) }}" @csrf
                                                    @method('GET') <input type="hidden" name="cambioEstado"
                                                    value="true">
                                                    <button type="submit" id="btn-submit"
                                                        class="btn btn-falabella btn-sm ">
                                                        <i
                                                            class="@if ($tiendapremio->estado == 1) fa-solid fa-ban @else fa-solid fa-check @endif">
                                                        </i> Deshabilitar
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.tiendapremio.disabled', [$tiendapremio->id]) }}" @csrf
                                                    @method('GET') <input type="hidden" name="cambioEstado"
                                                    value="true">
                                                    <button type="submit" id="btn-submit"
                                                        class="btn btn-falabella-2 btn-sm ">
                                                        <i
                                                            class="@if ($tiendapremio->estado == 2) fa-solid fa-check @else fa-solid fa-ban @endif">
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
