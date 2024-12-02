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

    <x-form action="{{route('verificar')}}" method="POST" id="form" class="appear-animation"  data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200"
    data-plugin-options="{'minWindowWidth': 0}">

        <x-inputs.text-input name="dni" label="DNI" :placeholder="'Introduce tu DNI'" :required="true"
            :boxClass="'col-12 col-lg-6'" :labelClass="'text-light'" :inputClass="'form-control-lg'" min-length=8
            max-length=8 />

        <input type="hidden" name="id_tienda" id="editor_content">
        <div class="form-check form-check-inline">
            <label class="form-check-label" for=""><a href="terminos" class="text-color-secondary"
                    required="true" data-bs-toggle="modal" data-bs-target="#Modal">Acepto los terminos y condiciones</a></label>
            <input class="form-check-input" type="checkbox" id="" value="1" name="terminos" />

        </div>

        <div class="mb-3 col-12">
            <button type="submit" class="btn btn-secondary text-color-light font-weight-bold text-5 btn-py-3 px-5 mt-2 appear-animation"
                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300"
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


    <p class="pt-5 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400"
    data-plugin-options="{'minWindowWidth': 0}">
        <strong class=" text-color-light text-uppercase d-inline-block pe-4">Patrocinado por:</strong>
        <img class="d-inline-block img-fluid me-3" style="max-height:40px"
            src="{{asset('img/logos/banco-falabella.png')}}" alt="" />
        <img class="d-inline-block img-fluid me-3" style="max-height:40px"
            src="{{asset('img/logos/cmr-falabella.png')}}" alt="" />
    </p>
</div>

<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalLabel">Terminos y condiciones</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                1. Definiciones:
1.1. Ruleta de Premios: Herramienta promocional utilizada para premiar a los clientes tras realizar una compra en nuestra tienda.
1.2. Participante: Cualquier cliente que cumpla con los requisitos para utilizar la ruleta de premios.

2. Requisitos de Participación:
2.1. Para participar, el cliente debe realizar una compra mínima de [monto o producto específico].
2.2. Solo se permite una participación por compra válida.
2.3. La ruleta está disponible únicamente para personas mayores de [edad mínima, ejemplo: 18 años].

3. Funcionamiento de la Ruleta de Premios:
3.1. Los premios de la ruleta son asignados de forma aleatoria mediante un sistema automatizado.
3.2. La decisión del sistema es final y no podrá ser cuestionada ni modificada.
3.3. Los premios disponibles están sujetos a disponibilidad y pueden variar sin previo aviso.

4. Premios:
4.1. Cada premio está claramente especificado en la ruleta y puede incluir: descuentos, productos gratis, puntos de fidelidad, o cualquier otra recompensa indicada.
4.2. Los premios no son transferibles, intercambiables por dinero en efectivo ni acumulativos, salvo que se indique lo contrario.
4.3. Algunos premios pueden requerir condiciones adicionales para su redención (ejemplo: validez de uso, requisitos de compra mínima).

5. Limitaciones y Exclusiones:
5.1. La empresa se reserva el derecho de modificar, suspender o cancelar la ruleta de premios en cualquier momento y por cualquier motivo.
5.2. No nos hacemos responsables por errores técnicos que puedan impedir la participación o el otorgamiento del premio.
5.3. La participación en la ruleta implica la aceptación total de estos términos y condiciones.

6. Protección de Datos:
6.1. Al participar, el cliente acepta proporcionar información necesaria para validar su participación y redimir los premios.
6.2. La información personal recopilada será tratada de acuerdo con nuestra [Política de Privacidad], disponible en [enlace a la política].

7. Resolución de Conflictos:
7.1. Cualquier conflicto relacionado con la ruleta de premios será resuelto por la empresa de manera interna.
7.2. En caso de disputas, el cliente podrá contactarnos a través de [correo electrónico o número de contacto].

8. Vigencia:
8.1. La ruleta de premios estará activa del [fecha de inicio] al [fecha de finalización].
8.2. Después de esta fecha, no se permitirá ninguna participación ni se otorgarán premios.

9. Modificaciones a los Términos:
9.1. Nos reservamos el derecho de modificar estos términos y condiciones en cualquier momento.
9.2. Las actualizaciones serán publicadas en nuestra página web y serán efectivas desde la fecha de su publicación.

10. Aceptación:
10.1. Al utilizar la ruleta de premios, el cliente acepta automáticamente estos términos y condiciones.

Nota: Asegúrate de adaptar los montos, fechas y detalles específicos según tus necesidades comerciales.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
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
