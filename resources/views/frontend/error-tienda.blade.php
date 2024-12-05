@extends('frontend.layouts.app')
@section('content')
<img src="{{asset('img/logos/Falabella-Logo.png')}}" alt="Logo" class="logo overflow-hidden">


<div class="container min-vh-100 d-flex align-items-center my-5">
    <div class="row mb-5">
        <div class="col-12">
            <div class="row">
                <div class="col-12">

                    <h1 class="display-4 text-color-light font-weight-bold py-0 mb-1 p-relative appear-animation"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750"
                    data-plugin-options="{'minWindowWidth': 0}">
                    <span class="p-relative z-index-1 fab-text-light">
                        ¿Quieres <span class="text-color-tertiary">participar?</span>
                    </span>
                    {{-- <span class="custom-stroke-text-effect-1 opacity-2 p-absolute text-10 right-0 me-4">LOL</span>
                    --}}
                </h1>
                <p class="text-4-5 font-weight-medium appear-animation fab-text-light py-0 mb-1 mt-2"
                    data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000"
                    data-plugin-options="{'minWindowWidth': 0}">
                    ¡Para acceder a la ruleta debes realizar una compra mayor a S/129 <br> y escanear el QR de la promoción!
                </p>

                </div>

            </div>

        </div>
    </div>
</div>



@endsection
