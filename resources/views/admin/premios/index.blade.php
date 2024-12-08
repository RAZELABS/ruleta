@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Lista de premios</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
                        <a href="{{ route('admin.premios.create') }}" class="btn btn-falabella btn-sm float-right">Agregar
                            premios</a>
                    </div>
                </div>
            </div>
            <div class="p-2 col-12 col-md-8 offset-md-2">
                <div class="p-4">
                    <table class="table table-striped" id="TABLE_1">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Resultado</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($premios as $premio)
                                <tr class="">
                                    <td scope="row">{{ $premio->id }}</td>
                                    <td scope="row">{{ $premio->descripcion ?? '' }}</td>
                                    <td scope="row">{{ $premio->premios->descripcion ??'' }}</td>
                                    <td scope="row">{{ $premio->parametro->descripcion ??''}}</td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            @if ($premio->estado == 1)
                                                <a href="{{ route('admin.premios.edit', $premio->id) }}"
                                                    class="btn btn-falabella btn-sm">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form class=""
                                                    action="{{ route('admin.premios.disabled', [$premio->id]) }}" @csrf
                                                    @method('GET') <input type="hidden" name="cambioEstado"
                                                    value="true">
                                                    <button type="submit" id="btn-submit"
                                                        class="btn btn-falabella btn-sm ">
                                                        <i
                                                            class="@if ($premio->estado == 1) fa-solid fa-ban @else fa-solid fa-check @endif">
                                                        </i> Deshabilitar
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.premios.disabled', [$premio->id]) }}" @csrf
                                                    @method('GET') <input type="hidden" name="cambioEstado"
                                                    value="true">
                                                    <button type="submit" id="btn-submit"
                                                        class="btn btn-falabella-2 btn-sm ">
                                                        <i
                                                            class="@if ($premio->estado == 2) fa-solid fa-check @else fa-solid fa-ban @endif">
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
            @if (session('message') ?? session('success'))
                <x-alerts.swal-notification icon="success" title="Exito"
                    text="{{ session('message') ?? session('success') }}" timer="3000" />
            @endif
            @if (session('error') || $errors->any())
                @php
                    $errorText = session('error') ?? implode(', ', $errors->all());
                @endphp
                <x-alerts.swal-notification icon="error" title="Error" text="{{ $errorText }}" timer="3000" />
            @endif
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
