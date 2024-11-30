<div class="col-lg-6 text-center text-lg-start pt-5">
    <h2 class="text-color-light positive-ls-3 mt-lg-5 pt-lg-5 font-weight-bold text-uppercase text-4 line-height-3 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">
        <img src="{{asset('img/logos/logo_fa.png')}}" class="img-fluid"  alt="" style="height: 70px !important"/>
    </h2>

    <h1 class="custom-font-size-1 text-color-light font-weight-bold py-3 mb-1 p-relative appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}">
        <span class="p-relative z-index-1">
       Ingresa tu <span class="text-color-tertiary">DNI</span>
        </span>
        <span class="custom-stroke-text-effect-1 opacity-2 p-absolute text-10 right-0 me-4">LOL</span></h1>

    <p class="text-4-5 font-weight-medium mb-4 appear-animation text-color-light" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">
       y empieza a ganar!
    </p>

    <x-form action="{{ route('admin.cotizaciones.enviaremail') }}" method="POST" id="form"
                        enctype="multipart/form-data" onsubmit="getEditorContent();">

                        <x-inputs.select-input label="Cliente" name="cliente_id" :options="$clientes" type="grouped"
                            required="true" class="col-12 col-md-6" />

                        <x-inputs.email-input name="email" label="Correo Electrónico" class="col-12 col-md-6"
                            placeholder="correo@ejemplo.com" required />

                        <x-inputs.text-input name="asunto" label="Asunto / Titulo"
                            placeholder="Introduce el asunto del email" required class="col-12 col-md-6" />

                        <x-inputs.file-input name="cotizacion" class="col-12 col-md-6"
                            label="Cotizacion (csv,txt,xlx,xls,xlsx,pdf / max:2mb)" required="true" />

                        <x-inputs.number-input name="monto" label="Monto" min="1" max="999999999" step="0.1"
                            placeholder="Monto de cotización" class="col-12 col-md-6" required="true" />

                        <x-inputs.select-input label="Divisa" name="divisa_id" :options="$divisas" type="grouped"
                            required="true" class="col-12 col-md-6" />

                        <input type="hidden" name="mensaje" id="editor_content">

                        <div class="mb-3 col-12 h-100">
                            <label class="form-label">Mensaje email</label>
                            <div class="form-control" id="editor"></div>
                        </div>
                        <div class="mb-3 col-12">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            @if (session('message') === 'true')
                            <x-alerts.swal-notification icon="success" title="Exito"
                                text="el correo se ha enviado correctamente." timer="3000" />
                            @endif
                            @if (session('error'))
                            <x-alerts.swal-notification icon="success" title="Exito" text="Error enviando el email."
                                timer="3000" />
                            @endif
                        </div>
                    </x-form>

    <a href="#" class="btn btn-tertiary positive-ls-2 text-color-light  font-weight-bold text-2 btn-py-3 px-5 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}">
        ¡Participa ya!
    </a>

    <p class="pt-5 mt-2">
        <strong class="positive-ls-2 text-uppercase d-inline-block pe-4">Partners:</strong>
        <img class="d-inline-block img-fluid me-3" style="max-height:40px" src="{{asset('img/logos/banco-falabella.png')}}" alt="" />
        <img class="d-inline-block img-fluid me-3" style="max-height:40px" src="{{asset('img/logos/cmr-falabella.png')}}" alt="" />
    </p>
</div>
