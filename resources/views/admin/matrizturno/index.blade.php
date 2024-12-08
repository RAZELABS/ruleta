@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">% de ganadores por turno</h1>
                    </div>
                </div>
            </div>
            <div class="p-2 col-12 col-md-8 offset-md-2">
                <div class="p-4">
                    <table class="table table-striped" id="TABLE_1">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Turno</th>
                                <th scope="col">Peso (%)</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matrizturnos as $matrizturno)
                                <tr class="">
                                    <td scope="row">{{ $matrizturno->id }}</td>
                                    <td scope="row">{{ $matrizturno->turno }}</td>
                                    <td scope="row">{{ $matrizturno->peso_turno }}</td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                                <a href="{{ route('admin.matrizturno.edit', $matrizturno->id) }}"
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
