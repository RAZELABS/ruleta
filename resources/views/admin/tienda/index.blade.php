@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="p-4 col-12 col-md-9 offset-md-1">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Lista de tiendas</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
                        <a href="{{ route('admin.generar.qrs') }}" class="btn btn-falabella">Generar QR's</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="p-4 col-12 col-md-9 offset-md-1 bg-white">
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table table-striped" id='TABLE_1'>
                            <thead>
                                <tr>
                                    <th scope="col">Codigo</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">QR</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tiendas as $tienda)
                                    <tr class="">
                                        <td scope="row">{{ $tienda->codigo }}</td>
                                        <td>{{ $tienda->nombre }}</td>
                                        <td class="float-center "><a href="{{ asset('qrs/' . $tienda->codigo . '.svg') }}"
                                                alt="QR de {{ $tienda->nombre }}"
                                                class="btn btn-falabella-2 btn-sm w-100">QR de
                                                {{ $tienda->nombre }}</a></td>
                                        <td>
                                            <div class="btn-group btn-group-toggle">
                                                <!-- Botón para editar -->
                                                @if ($tienda->estado == 1)
                                                    <a href="{{ route('admin.tienda.edit', $tienda->id) }}"
                                                        class="btn btn-falabella-start btn-sm">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                @endif

                                                <!-- Formulario para cambiar el estado -->
                                                <form action="{{ route('admin.tienda.disabled', $tienda->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm {{ $tienda->estado == 1 ? 'btn-falabella-end' : 'btn-falabella-2' }}">
                                                        <i
                                                            class="{{ $tienda->estado == 1 ? 'fa-solid fa-ban' : 'fa-solid fa-check' }}"></i>
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

        </div>
    </div>
    @if (session('success') || session('message'))
        <x-alerts.swal-notification icon="success" title="Exito" text="{{ session('message') ?? session('success') }}"
            timer="3000" />
    @endif
    @if (session('error') || $errors->any())
        @php
            $errorText = session('error') ?? implode(', ', $errors->all());
        @endphp
        <x-alerts.swal-notification icon="error" title="Error" text="{{ $errorText }}" timer="3000" />
    @endif
@endsection
@push('scripts')
    <script>
        var routeConfigurations = {
            'TABLE_1': {
                'botones': 'Bfrtip',
                'ordenar': [0, "asc"],
                'columnDefs': [{
                    'targets': [2],
                    'orderable': false
                }]
            },
        }
    </script>
@endpush
@push('scripts')
    <script src="{{ asset('plugins/datatables/datatables-config.js') }}"></script>
@endpush
