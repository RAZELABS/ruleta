@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="p-4 col-12 col-md-6 offset-md-3">
                <div class="row">
                    <div class="col-12 col-md-6 d-flex justify-content-start">
                        <h1 class="text-secondary fw-bold">Agregar parametros</h1>
                    </div>
                    <div class="col-12 col-md-6 d-flex justify-content-end align-items-center">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <form action="{{route('admin.parametros.store')}}" id="createParametros" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="mb-3 col-12 col-md-6">
                            <label for="flag" class="form-label">Flag</label>
                            <input type="text" class="form-control" id="flag" name="flag">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="valor" class="form-label">Valor</label>
                            <input type="text" class="form-control" id="valor" name="valor">
                        </div>
                        <div class="mb-3 col-12 col-md-6">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    @if (session('message') ?? session('success'))
                        <x-alerts.swal-notification icon="success" title="Exito" text="{{ session('message') ?? session('success')}}"
                            timer="3000" />
                    @endif
                    @if (session('error') || $errors->any())
                        @php
                            $errorText = session('error') ?? implode(', ', $errors->all());
                        @endphp
                        <x-alerts.swal-notification icon="error" title="Error" text="{{ $errorText }}"
                            timer="3000" />
                    @endif

                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        initializeValidation("#createParametros", {
            flag: {
                minlength: 3,
                maxlength: 20,
                required: true
            },

            valor: {
                required: true
            }

            descripcion: {
                minlength: 3,
                maxlength: 50,
                required: true
            },

        }, {
            flag: {
                minlength: "El nombre debe tener al menos 3 caracteres.",
                maxlength: "El nombre debe tener máximo 20 caracteres.",
                required: "Este campo es obligatorio"
            },

            valor: {
                required: "Este campo es obligatorio"
            }

            descripcion: {
                minlength: "La descripcion debe tener al menos 3 caracteres.",
                maxlength: "La descripcion debe tener máximo 50 caracteres.",
                required: "Este campo es obligatorio"
            },
        })
    </script>
@endpush