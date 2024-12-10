@extends('frontend.layouts.app')
@section('content')

<div class="container justify-content-center my-5">
    <div class="row">
        <div class="col col-lg-12 w-100 text-align-center pt-5 mt-5 pt-lg-2 mpt-lg-2">
            <h1 class="display-3 font-weight-bold titulo-sorry p-3">¡SIGUE INTENTANDO!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col col-lg-6 p-4 mt-2">
            <h1 class="font-weight-bold fab-text-light text-sorry" style="text-align: end;">Por compras mayores a s/129
                podrás llevarte tus compras
                gratis girando la ruleta.</h1>

        </div>

        <div class=" col col-lg-6 p-4 d-flex justify-content-center">
                <img src="{{asset('frontend/img/elementos/tarjetas.png')}}" style="max-width:400px !important; height:auto" class="tarjetas">
        </div>

    </div>
</div>
{{-- <source src="{{asset('frontend/sounds/verde.mp3')}}" type="audio/mp3"> --}}

<audio id="sorryAudio" loop>
    <source src="{{asset('frontend/sounds/verde.mp3')}}" type="audio/mp3">
</audio>
<button id="playSoundButton" style="display:none;">Play Sound</button>
@endsection
@push('scripts')

<script src="{{ asset('backend/js/modal-sorry.js') }}?v={{ time() }}"></script>

@endpush
