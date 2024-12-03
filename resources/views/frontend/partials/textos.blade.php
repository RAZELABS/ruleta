

        <div class="col-10 col-md-6 offset-1 offset-md-0 col-lg-6 text-start text-lg-start ">
            <div class="row">
                <h2 class="text-color-light positive-ls-3 pt-5 pt-lg-2 font-weight-bold text-uppercase text-4 line-height-3 mb-0 appear-animation"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"
                    data-plugin-options="{'minWindowWidth': 0}">
                    <img src="{{asset('img/logos/logo_fa.png')}}" class="img-fluid" alt=""
                        style="height: 70px !important" />
                </h2>

                <h1 class="custom-font-size-1 text-color-light font-weight-bold py-0 mb-1 p-relative appear-animation"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750"
                    data-plugin-options="{'minWindowWidth': 0}">
                    <span class="p-relative z-index-1 fab-text-light">
                        Ingresa tu <span class="text-color-tertiary">DNI</span>
                    </span>
                    {{-- <span class="custom-stroke-text-effect-1 opacity-2 p-absolute text-10 right-0 me-4">LOL</span>
                    --}}
                </h1>

                <p class="text-4-5 font-weight-medium mb-4 appear-animation fab-text-light"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000"
                    data-plugin-options="{'minWindowWidth': 0}">
                    y empieza a ganar!
                </p>
            </div>
            <div class="row">
                <x-form action="{{route('verificar')}}" method="POST" id="form" class="appear-animation"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200"
                    data-plugin-options="{'minWindowWidth': 0}">

                    <div class="mb-3 col-12 col-lg-6">
                        <label for="" class="form-label fab-text-enfasis">Tipo de documento</label>
                        <select class="form-select form-select-lg" name="tipo_documento" id="tipo_documento">
                            <option selected disabled>Selecciona una opción</option>
                            @foreach ( $tipo_documentos as $tipo_documento )
                            <option value="{{$tipo_documento->valor}}">{{$tipo_documento->descripcion}}</option>
                            @endforeach
                        </select>
                    </div>


                    <x-inputs.text-input name="dni" label="DNI" :placeholder="'Introduce tu DNI'" :required="true"
                        :boxClass="'col-12 col-lg-6'" :labelClass="'fab-text-enfasis'" :inputClass="'form-control-lg'"
                        min-length=8 max-length=8 />

                    <input type="hidden" name="id_tienda" id="editor_content">


                    <div class="mb-3 col-12">
                        <button id="participar" type="button"
                            class="btn btn-secondary fab-text-light font-weight-bold text-5 btn-py-3 px-5 mt-2 appear-animation"
                            data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
                            data-plugin-options="{'minWindowWidth': 0}" onclick="mostrarTerminosCondiciones()">
                            Participar
                        </button>
                    </div>
                </x-form>
            </div>

            @if (session('success'))
            <x-alerts.swal-notification icon="success" title="Exito" text="{{session('message')}}" timer="3000" />
            @endif
            @if (session('error') || $errors->any())
            @php
            $errorText = session('error') ?? implode(', ', $errors->all());
            @endphp
            <x-alerts.swal-notification icon="error" title="Error" text="{{ $errorText }}" timer="3000" />
            @endif
        </div>




@push('styles')
<style>
    .invalid-feedback {
        background-color: red;
        padding: 5px 20px;
        color: #fff !important;
        width: auto;
        border-radius: 10px
    }

    .terms-swal-popup {
        max-height: 100vh !important;
        background-color: #f9f9f9;
        opacity: 0.98;
        border-radius: 20px
    }

    .terms-swal-content {
        padding: 0 !important;
    }

    .terms-container {
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 10px;

    }

    .terms-container p {
        margin-bottom: 10px;
        padding: 10px;
        opacity: 1;
    }
</style>
@endpush
@push('scripts')
<script>
    function mostrarTerminosCondiciones() {
    Swal.fire({
        title: 'Términos y Condiciones',
        html: `
            <div class="terms-container" style="height: 60vh; overflow-y: auto; margin-bottom: 20px; text-align: left;">
                <p>1. Definiciones:</p>
                <p>1.1. Ruleta de Premios: Herramienta promocional utilizada para premiar a los clientes tras realizar una compra en nuestra tienda.</p>
                <p>1.2. Participante: Cualquier cliente que cumpla con los requisitos para utilizar la ruleta de premios.</p>
                <!-- Copy all your terms and conditions here -->
                <!-- ... -->
                <p>10.1. Al utilizar la ruleta de premios, el cliente acepta automáticamente estos términos y condiciones.</p>
                <p>1. Definiciones:</p>
                <p>1.1. Ruleta de Premios: Herramienta promocional utilizada para premiar a los clientes tras realizar una compra en nuestra tienda.</p>
                <p>1.2. Participante: Cualquier cliente que cumpla con los requisitos para utilizar la ruleta de premios.</p>
                <!-- Copy all your terms and conditions here -->
                <!-- ... -->
                <p>10.1. Al utilizar la ruleta de premios, el cliente acepta automáticamente estos términos y condiciones.</p>
                <p>1. Definiciones:</p>
                <p>1.1. Ruleta de Premios: Herramienta promocional utilizada para premiar a los clientes tras realizar una compra en nuestra tienda.</p>
                <p>1.2. Participante: Cualquier cliente que cumpla con los requisitos para utilizar la ruleta de premios.</p>
                <!-- Copy all your terms and conditions here -->
                <!-- ... -->
                <p>10.1. Al utilizar la ruleta de premios, el cliente acepta automáticamente estos términos y condiciones.</p>
                <p>1. Definiciones:</p>
                <p>1.1. Ruleta de Premios: Herramienta promocional utilizada para premiar a los clientes tras realizar una compra en nuestra tienda.</p>
                <p>1.2. Participante: Cualquier cliente que cumpla con los requisitos para utilizar la ruleta de premios.</p>
                <!-- Copy all your terms and conditions here -->
                <!-- ... -->
                <p>10.1. Al utilizar la ruleta de premios, el cliente acepta automáticamente estos términos y condiciones.</p>
                <p>1. Definiciones:</p>
                <p>1.1. Ruleta de Premios: Herramienta promocional utilizada para premiar a los clientes tras realizar una compra en nuestra tienda.</p>
                <p>1.2. Participante: Cualquier cliente que cumpla con los requisitos para utilizar la ruleta de premios.</p>
                <!-- Copy all your terms and conditions here -->
                <!-- ... -->
                <p>10.1. Al utilizar la ruleta de premios, el cliente acepta automáticamente estos términos y condiciones.</p>
            </div>
        `,
        width: '80%',
        padding: '20px',
        confirmButtonText: 'Aceptar Términos y Condiciones',
        confirmButtonColor: '#3085d6',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#d33',
        allowOutsideClick: false,
        customClass: {
            container: 'terms-swal-container featured-box.border-radius',
            popup: 'terms-swal-popup',
            content: 'terms-swal-content',
        }
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Procesando...',
                text: 'Por favor espere mientras procesamos su solicitud',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            document.getElementById('form').submit();
            console.log('Términos aceptados');
        }else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire({
                title: '¡Atención!',
                text: 'Si no aceptas los términos y condiciones no podrás participar en la ruleta de premios.',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Entendido'
            });
        }
    });
    }
</script>
<script>
    initializeValidation("#form");
    $(document).ready(function () {
    // Limitar caracteres mientras el usuario escribe
    $("#dni").on("input", function () {
        let maxLength = 8; // limite de caracteres
        if ($(this).val().length > maxLength) {
            $(this).val($(this).val().substring(0, maxLength)); // Trunca el texto
        }
    })
    $("#dni").on("input", function () {
        $(this).val($(this).val().replace(/[^0-9]/g, "")); // Reemplaza cualquier carácter no numérico
    });
    });
</script>
@endpush
