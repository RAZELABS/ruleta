@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-2 col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-9 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Modificar Movimiento del Kiosco</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
                    </div>
                </div>
            </div>
        </div>
        <div class="p-2 col-12 col-md-8 offset-md-2">
            <form action="{{ route('admin.kiosco.update', $kioscos->id) }}" id="ModificaKioscos" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha"
                            value="{{ \Carbon\Carbon::parse($kioscos->fecha)->format('Y-m-d') }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="hora" class="form-label">Hora</label>
                        <input type="text" class="form-control" id="hora" name="hora"
                            value="{{ $kioscos->hora }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="tipo_documento" class="form-label">Tipo de documento</label>
                        <input type="text" class="form-control" id="tipo_documento" name="tipo_documento"
                            value="{{ $kioscos->tipo_documento }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nro_documento" class="form-label">Número de documento</label>
                        <input type="text" class="form-control" id="nro_documento" name="nro_documento"
                            value="{{ $kioscos->nro_documento }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="codigo_tienda" class="form-label">Código de tienda</label>
                        <input type="text" class="form-control" id="codigo_tienda" name="codigo_tienda"
                            value="{{ $kioscos->codigo_tienda }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="orden_compra" class="form-label">Orden de compra</label>
                        <input type="text" class="form-control" id="orden_compra" name="orden_compra"
                            value="{{ $kioscos->orden_compra }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="monto" class="form-label">Monto</label>
                        <input type="decimal" class="form-control" id="monto" name="monto"
                            value="{{ $kioscos->monto }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
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

            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        initializeValidation("#modificaKioscos", {
            fecha: {
                required: true
            },

        }, {
            fecha: {
                required: "Este campo es obligatorio"
            },

        })
    </script>
@endpush
