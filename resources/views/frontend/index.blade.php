@extends('frontend.layouts.app')
@section('content')

<section id="overview" class="section bg-transparent border-0 py-5 m-0 p-relative">

    <div class="container pt-lg-5">
        <div class="row pt-lg-5">
            <div class="col-lg-8 text-center text-lg-start pt-5 mt-5">
                <h2 class="text-color-primary positive-ls-3 mt-lg-5 pt-lg-5 font-weight-bold text-uppercase text-4 line-height-3 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}">Compra, participa y gana en la</h2>

                <h1 class="custom-font-size-1 text-color-quaternary font-weight-bold py-3 mb-1 p-relative appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'minWindowWidth': 0}"><span class="p-relative z-index-1">Ruleta <span class="text-color-tertiary">CMR</span></span><span class="custom-stroke-text-effect-1 opacity-2 p-absolute text-10 right-0 me-4">CMR</span></h1>

                <p class="text-4-5 font-weight-medium mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000" data-plugin-options="{'minWindowWidth': 0}">del banco falabella, solo con tu DNI!</p>

                <a href="#" class="btn btn-tertiary positive-ls-2 text-color-light  font-weight-bold text-2 btn-py-3 px-5 mt-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="250" data-plugin-options="{'minWindowWidth': 0}">¡Participa ya!</a>

                <p class="pt-5 mt-2">
                    <strong class="positive-ls-2 text-uppercase d-inline-block pe-4">Partners:</strong>
                    <img class="d-inline-block img-fluid me-3" style="max-height:40px" src="{{asset('img/logos/banco-falabella.png')}}" alt="" />
                    <img class="d-inline-block img-fluid me-3" style="max-height:40px" src="{{asset('img/logos/cmr-falabella.png')}}" alt="" />
                </p>
            </div>
            <div class="col-lg-4 pt-5 pt-lg-0 text-center">

                <div class="custom-carousel-1 m-auto">
                    <div class="owl-carousel owl-theme stage-margin nav-style-1 " data-plugin-options="{'items': 1, 'margin': 1, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 35, 'autoplay': true, 'autoplayTimeout': 3000}">
                        <div >
                            <img alt="" class="img-fluid" src="{{asset('frontend/img/slides/slide-1.png')}}" >
                        </div>
                        <div >
                            <img alt="" class="img-fluid" src="{{asset('frontend/img/slides/slide-2.png')}}" >
                        </div>
                        <div >
                            <img alt="" class="img-fluid" src="{{asset('frontend/img/slides/slide-3.png')}}" >
                        </div>
                        <div >
                            <img alt="" class="img-fluid" src="{{asset('frontend/img/slides/slide-2.png')}}" >
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>

@endsection

