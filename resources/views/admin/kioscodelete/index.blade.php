@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Eliminación de carga de kioscos</h1>
                    </div>
                </div>
            </div>
            <div class="p-2 col-12 col-md-10 offset-md-1">
                <div class="p-4">
                    <table class="table table-striped" id="TABLE_1">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kioscos as $kiosco)
                                <tr class="">
                                    <td scope="row">{{ $kiosco->fecha_carga}}</td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            <form class=""
                                                action="{{ route('admin.kioscodelete.destroy', $kiosco->fecha_carga) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="eliminaKiosco" value="true">
                                                <button type="submit" id="btn-submit" class="btn btn-falabella-2 btn-sm ">
                                                    <i class=" fa-solid fa-ban ">
                                                    </i> Eliminar
                                                </button>
                                            </form>
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
