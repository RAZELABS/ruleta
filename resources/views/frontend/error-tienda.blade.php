@extends('frontend.layouts.app')
@section('content')
<img src="{{asset('img/logos/Falabella-Logo.png')}}" alt="Logo" class="logo overflow-hidden">


<div class="container min-vh-100 d-flex align-items-center my-5">
    <div class="alert alert-danger">
        <h4>Error de Acceso</h4>
        <p>Debe acceder mediante el código QR de la tienda.</p>
    </div>
</div>



@endsection
