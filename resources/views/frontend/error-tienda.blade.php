@extends('frontend.layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center">
    <div class="row justify-content-center" id="contenedor-fb">
        <div class="col-10 mb-5 mb-lg-1 col-lg-6 ">
            <div class="row justify-content-center">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <img src="{{asset('frontend/img/elementos/ruleta-index-1.png')}}" alt="Logo"
                        style="max-width:300px">
                </div>
            </div>
        </div>
        <div class="col-10 col-lg-6 px-3">
            <div class="row justify-content-center">
                <div class="col-12 col-md-12 pt-3">
                    <h1 class="display-4 text-color-light font-weight-bold py-0 mb-1 p-relative appear-animation"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750"
                        data-plugin-options="{'minWindowWidth': 0}">
                        <span class="p-relative z-index-1 fab-text-light">
                            ¿Quieres participar?
                        </span>
                    </h1>
                    <p class="text-4-5 font-weight-medium appear-animation fab-text-light py-0 mb-1 mt-2"
                        data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000"
                        data-plugin-options="{'minWindowWidth': 0}">
                        ¡Para acceder a la ruleta debes realizar una compra mayor a S/129 <br> y escanear el QR de la
                        promoción!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>






@endsection
