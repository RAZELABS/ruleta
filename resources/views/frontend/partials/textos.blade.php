
    <div>
        <div class="row">
            <h2 class="text-color-light positive-ls-3 pt-5 pt-lg-2 font-weight-bold text-uppercase text-4 line-height-3 mb-0 appear-animation"
                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"
                data-plugin-options="{'minWindowWidth': 0}">
                <img src="{{asset('img/logos/logo_fa.png')}}" class="img-fluid" alt=""
                    style="height: 70px !important" />
            </h2>

            <h1 class="display-4 text-color-light font-weight-bold py-0 mb-1 p-relative appear-animation"
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
                <x-inputs.text-input name="nro_documento" label="DNI" :placeholder="'Introduce tu DNI'" :required="true"
                    :boxClass="'col-12 col-lg-6'" :labelClass="'fab-text-enfasis'" :inputClass="'form-control-lg'"
                    min-length=8 max-length=8/>
                <input type="hidden" name="id_tienda" id="editor_content" value="{{$tiendaId}}">
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
                <p>TCEA Máxima 165.18% calculada considerando la TEA máxima aplicable: 109.83%. Ejemplo: Consumo S/ 1000, plazo 12 meses, con envío virtual de estado de cuenta mensual, membresía anual Tarjeta CMR Visa Clásica S/ 69. Membresías varían por tipo de tarjeta, ver Tarifario de nuestras Tarjetas CMR en www.bancofalabella.pe y Agencias. Las cuotas son calculadas a 30 días, por lo que, si el plazo transcurrido entre la fecha de compra y el primer vencimiento es diferente de 30 días, su primera cuota reflejará un ajuste de interés por dicha diferencia. El límite de compras con la Tarjeta de Débito de Banco Falabella en POS físico es de 10,000 Soles o 5,000 Dólares por día y para compras por internet de 3,000 Soles o 750 Dólares por día. Condiciones: Campaña vigente del 10 al 24 de diciembre de 2024. Válido exclusivamente en tiendas físicas de Falabella para clientes que realicen compras mayores a S/129 con las tarjetas de Banco Falabella: Débito, CMR Visa Clásica, Platinum y Signature. Mecánica: Al realizar una compra mayor a S/129 el cliente tiene la opción de girar la ruleta en la tienda donde realizó la compra. Para ello deberá acercarse al módulo de la campaña que se encontrará visible en la tienda y, antes de girar la ruleta, deberá inscribirse en la campaña ingresando su número de documento (DNI o CE), el cual será usado para abonar el premio si es que es uno de los ganadores. El número de documento deberá ser del titular o adicional que realizó la compra. El cliente tendrá la opción de girar la ruleta únicamente en el día y en la tienda donde realizó la compra. Es responsabilidad del cliente ingresar correctamente su número de documento para poder realizarle la devolución de su compra. Máximo 1 giro diario por cliente. El premio consiste en la devolución de las compras que realizó el día que giró la ruleta en la tienda Falabella. La devolución se abonará a la tarjeta CMR/débito Banco Falabella del titular 3 días hábiles posterior al giro de la ruleta. Tope máximo de devolución por cliente S/1,000. No válido para compras en web y app de Falabella.com ni fonocompras. No participan clientes con tarjetas CMR Refinanciadas, bloqueadas, con mora ni con problemas crediticios. Fondo máximo promocional S/500,000.00. La inscripción de los interesados en este concurso facultará a Banco Falabella Perú S.A. a difundir el resultado del concurso, a publicitar a cada ganador e incluir su nombre, DNI, voz y/o imagen, en la publicidad que se difunda por el medio que determine Banco Falabella Perú S.A., sin derecho a remuneración ni pago alguno por este concepto. Lo señalado implica la autorización expresa de los participantes a Banco Falabella Perú S.A., para realizar el tratamiento de los datos personales que le proporciona a través de este medio, así como la información que se derive de su uso, de acuerdo con la Ley N° 29733 y su Reglamento. En caso el cliente se oponga al dicho uso, deberá expresarlo mediante una comunicación a través de los canales del banco (sucursales, banca telefónica y chatbot). Información difundida de acuerdo al Reglamento de Gestión de Conducta de Mercado vigente.</p>
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
        var tipoDoc;
        let maxLength;
        $("#tipo_documento").on('change keyup', function() {
            tipoDoc = $("#tipo_documento").val();
        if(tipoDoc == 1){
            maxLength = 8;
        }
        if(tipoDoc == 2){
            maxLength = 12;
        }
    });
        $("#nro_documento").on("input", function () {
            if ($(this).val().length > maxLength) {
                $(this).val($(this).val().substring(0, maxLength)); // Trunca el texto
            }
        })
        $("#nro_documento").on("input", function () {
            $(this).val($(this).val().replace(/[^0-9]/g, "")); // Reemplaza cualquier carácter no numérico
        });
    });
</script>
@endpush
