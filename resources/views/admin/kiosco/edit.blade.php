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
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
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
