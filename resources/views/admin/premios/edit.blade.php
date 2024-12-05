@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-2 col-12 col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Modificar premios</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
                    </div>
                </div>
            </div>
        </div>
        <div class="p-2 col-12 col-md-8 offset-md-2">
            <form action="{{ route('admin.premios.update', $premioss->id) }}" id="ModificaPremios" method="POST">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion"
                            value="{{ $premioss->descripcion }}">
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="resultado" class="form-label">Resultado</label>
                        <select class="form-select form-select-lg" name="resultado" id="resultado">
                            <option selected value="{{ $premioss->premio}}">{{$premioss->premios->descripcion }}</option>
                            @foreach ($premios as $premio)
                                <option value="{{ $premio->id }}">{{ $premio->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select form-select-lg" name="estado" id="estado">
                            <option selected value="{{ $premioss->estado}}">{{$premioss->parametro->descripcion }}</option>
                            @foreach ($parametro as $parametros)
                                <option value="{{ $parametros->id }}">{{ $parametros->descripcion }}</option>
                            @endforeach
                        </select>
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
        initializeValidation("#modificaPremios", {
            descripcion: {
                minlength: 3,
                maxlength: 20,
                required: true
            },

            estado: {
                required: true
            }
        }, {
            descripcion: {
                minlength: "El nombre debe tener al menos 3 caracteres.",
                maxlength: "El nombre debe tener máximo 20 caracteres.",
                required: "Este campo es obligatorio"
            },

            estado: {
                required: "Este campo es obligatorio"
            }
        })
    </script>
@endpush
