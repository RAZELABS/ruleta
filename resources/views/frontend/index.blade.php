@extends('frontend.layouts.app')
@section('content')
<div class="container d-flex align-items-center justify-content-center">
    <div class="row justify-content-center" id="contenedor-fb">
        <div class="col-10 mb-5 mb-lg-1 col-lg-6 ">
            @include('frontend.partials.publicidad')
        </div>
        <div class="col-10 col-lg-6 px-3">
            @include('frontend.partials.textos')
        </div>
    </div>
</div>
@endsection
