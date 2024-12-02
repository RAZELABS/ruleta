<div class="col-lg-6 text-center text-lg-start pt-5">
    <h2 class="text-color-light positive-ls-3 mt-lg-5 pt-lg-5 font-weight-bold text-uppercase text-4 line-height-3 mb-0 appear-animation"
        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"
        data-plugin-options="{'minWindowWidth': 0}">
        <img src="{{asset('img/logos/logo_fa.png')}}" class="img-fluid" alt="" style="height: 70px !important" />
    </h2>

    <h1 class="custom-font-size-1 text-color-light font-weight-bold py-3 mb-1 p-relative appear-animation"
        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750"
        data-plugin-options="{'minWindowWidth': 0}">
        <span class="p-relative z-index-1">
            Ingresa tu <span class="text-color-tertiary">DNI</span>
        </span>
        {{-- <span class="custom-stroke-text-effect-1 opacity-2 p-absolute text-10 right-0 me-4">LOL</span> --}}
    </h1>

    <p class="text-4-5 font-weight-medium mb-4 appear-animation text-color-light"
        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000"
        data-plugin-options="{'minWindowWidth': 0}">
        y empieza a ganar!
    </p>

    <x-form action="{{route('verificar')}}" method="POST" id="form">

        <x-inputs.text-input name="dni" label="DNI" :placeholder="'Introduce tu DNI'" :required="true"
            :boxClass="'col-12 col-lg-6'" :labelClass="'text-light'" :inputClass="'form-control-lg'" min-length=8
            max-length=8 />

        <input type="hidden" name="id_tienda" id="editor_content">
        <div class="form-check form-check-inline">
            <label class="form-check-label" for=""><a href="terminos" class="text-color-secondary"
                    required="true">Acepto los terminos y condiciones</a></label>
            <input class="form-check-input" type="checkbox" id="" value="1" name="terminos" />

        </div>

        <div class="mb-3 col-12">
            <button type="submit"
                class="btn btn-secondary text-color-light font-weight-bold text-5 btn-py-3 px-5 mt-2 appear-animation"
                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250"
                data-plugin-options="{'minWindowWidth': 0}">
                Participar
            </button>
            @if (session('success'))
            <x-alerts.swal-notification icon="success" title="Exito" text="{{session('message')}}"
                timer="3000" />
            @endif
            @if (session('error') || $errors->any())
            @php
            $errorText = session('error') ?? implode(', ', $errors->all());
        @endphp
            <x-alerts.swal-notification icon="error" title="Error" text="{{ $errorText }}" timer="3000" />
            @endif
        </div>
    </x-form>


    <p class="pt-5 mt-2">
        <strong class=" text-color-light text-uppercase d-inline-block pe-4">Patrocinado por:</strong>
        <img class="d-inline-block img-fluid me-3" style="max-height:40px"
            src="{{asset('img/logos/banco-falabella.png')}}" alt="" />
        <img class="d-inline-block img-fluid me-3" style="max-height:40px"
            src="{{asset('img/logos/cmr-falabella.png')}}" alt="" />
    </p>
</div>

@push('scripts')
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
@push('styles')
<style>
    .invalid-feedback {
        background-color: red;
        padding: 5px 20px;
        color: #fff !important;
        width: auto;
        border-radius: 10px
    }
</style>
@endpush
