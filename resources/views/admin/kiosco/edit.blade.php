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
                            value="{{ $kioscos->fecha }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="tipodocumento" class="form-label">Tipo de documento</label>
                        <input type="text" class="form-control" id="tipodocumento" name="tipodocumento"
                            value="{{ $kioscos->tipo_documento }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="nrodocumento" class="form-label">Número de documento</label>
                        <input type="text" class="form-control" id="nrodocumento" name="nrodocumento"
                            value="{{ $kioscos->nro_documento }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="codigotienda" class="form-label">Código de tienda</label>
                        <input type="text" class="form-control" id="codigotienda" name="codigotienda"
                            value="{{ $kioscos->codigo_tienda }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="ordencompra" class="form-label">Orden de compra</label>
                        <input type="text" class="form-control" id="ordencompra" name="ordencompra"
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
