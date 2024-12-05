@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-9 offset-md-1">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Lista de parametros</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
                        <a href="{{ route('admin.parametros.create') }}" class="btn btn-falabella">Agregar parametros</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="p-4 col-12 bg-white">
                {{-- {{ $usersData }} --}}
                <div class="p-4">
                    {{-- <x-data-table idTable='TABLE_1' :columns="['ID', 'Descripcion','Estado']" :columnsClass="['', '','']" :datos=$parametrosData /> --}}
                    <div class="table-responsive">
                        <table class="table table-striped" id="TABLE_1">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Flag</th>
                                    <th scope="col">Valor</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($parametros as $parametro)
                                    <tr class="">
                                        <td scope="row">{{ $parametro->id }}</td>
                                        <td scope="row">{{ $parametro->flag }}</td>
                                        <td scope="row">{{ $parametro->valor }}</td>
                                        <td scope="row">{{ $parametro->descripcion }}</td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <a href="{{ route('admin.parametros.edit', $parametro->id) }}"
                                                    class="btn btn-falabella-2 btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
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
