@extends('frontend.layouts.app')
@section('content')


    <div class="container min-vh-100 d-flex align-items-center my-5 py-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    @include('frontend.partials.telefono')
                    @include('frontend.partials.textos')
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto" id="patrocinadores">
                        <p class="appear-animation m-0 pt-0 px-5 " data-appear-animation="fadeInUpShorter"
                            data-appear-animation-delay="1400" data-plugin-options="{'minWindowWidth': 0}">
                            <strong class="fab-text-dark text-uppercase d-inline-block pe-4">Patrocinado por:</strong>
                            <img class="d-inline-block img-fluid me-3" style="max-height:40px"
                                src="{{asset('img/logos/banco-falabella.png')}}" alt="" />
                            <img class="d-inline-block img-fluid me-3" style="max-height:40px"
                                src="{{asset('img/logos/cmr-falabella.png')}}" alt="" />
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
