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
            <form action="{{ route('admin.matrizdia.update', $matriz_dia->id) }}" id="ModificaMatriz" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha"
                            value="{{ $matriz_dia->fecha }}" readonly>
                    </div>

                    <div class="mb-3 col-12 col-md-6">
                        <label for="peso_dia" class="form-label">Porcentaje</label>
                        <input type="decimal" class="form-control" id="peso_dia" name="peso_dia"
                            value="{{ $matriz_dia->peso_dia }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="ganadores_dia" class="form-label">Ganadores del día</label>
                        <input type="number" class="form-control" id="ganadores_dia" name="ganadores_dia"
                            value="{{ $matriz_dia->ganadores_dia }}">
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
