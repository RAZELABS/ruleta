@extends('frontend.layouts.app')
@section('content')
<div class="container justify-content-center my-5">
    <div class="row">
        <div class="col col-lg-12 w-100 text-align-center pt-5 mt-5 pt-lg-2 mpt-lg-2">
            <h1 class="display-5 display-lg-1 font-weight-bold titulo-ganador p-3">¡GANASTE!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-6 p-4">
            <h1 class="font-weight-bold fab-text-light">El premio se te abonará en 3 días
                hábiles en tu medio de pago</h1>
            <p class="text-5 font-weight-bold fab-text-enfasis">(CMR o Débito Banco Falabella)</p>
        </div>

        <div class="col col-lg-6 p-4 d-flex justify-content-center">
            <img src="{{asset('frontend/img/elementos/tarjetas-2.png')}}" class="tarjetas">
        </div>
    </div>
</div>
@endsection