@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-2 col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Modificar % de ganadores</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
                    </div>
                </div>
            </div>
        </div>
        <div class="p-2 col-12 col-md-8 offset-md-2">
            <form action="{{ route('admin.matriztienda.update', $matriz_tienda->id) }}" id="ModificaMatriz" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="tienda" class="form-label">Tienda</label>
                        <input type="text" class="form-control" id="tienda" name="tienda"
                            value="{{ $matriz_tienda->tienda->nombre }}" readonly>
                    </div>

                    <div class="mb-3 col-12 col-md-6">
                        <label for="peso_tienda" class="form-label">Porcentaje</label>
                        <input type="decimal" class="form-control" id="peso_tienda" name="peso_tienda"
                            value="{{ $matriz_tienda->peso_tienda }}">
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
        initializeValidation("#modificaMatriz", {
            peso_dia: {
                required: true
            }
        }, {
            peso_dia: {
                required: "Este campo es obligatorio"
            }
        })
    </script>
@endpush
