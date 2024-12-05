@extends('frontend.layouts.app')
@section('content')
<div class="container justify-content-center my-5">
    <div class="row">
        <div class="col col-lg-12 w-100 text-align-center pt-5 mt-5 pt-lg-2 mpt-lg-2">
            <h1 class="display-3 font-weight-bold titulo-sorry p-3">¡SIGUE INTENTANDO!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-6 p-4">
            <h1 class="font-weight-bold fab-text-light">Por compras mayores a s/129
                podrás llevarte tus compras
                gratis girando la ruleta.</h1>

        </div>

        <div class="col col-lg-6 p-4 d-flex justify-content-center">
            <img src="{{asset('frontend/img/elementos/tarjetas.png')}}">
        </div>

    </div>

</div>
@endsection
