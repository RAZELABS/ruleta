@extends('frontend.layouts.app')
@section('content')
<div class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover show-dots-xs show-dots-sm show-dots-md nav-style-1 nav-inside nav-inside-plus nav-dark nav-lg nav-font-size-lg show-nav-hover bg-color-quaternary custom-slider-container mb-0"
    data-plugin-options="{'autoplay': true, 'autoplayTimeout': 7000}"
    data-dynamic-height="['991px','991px','991px','750px','750px']" style="height: 991px;">
    <div class="owl-stage-outer">
        <div class="owl-stage">

            <!-- Carousel Slide 1 -->
            <div class="owl-item position-relative overflow-hidden">
                <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                    data-appear-animation="kenBurnsToLeft" data-appear-animation-duration="30s"
                    data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                    style="background-image: url({{ asset('frontend/img/slides/slide-1.jpg') }}); background-size: cover; background-position: center;">
                </div>
                <div class="container position-relative z-index-3 pb-5 h-100">
                    <div class="row justify-content-center justify-content-lg-start align-items-center pb-5 h-100">
                        <div class="col-sm-9 col-lg-7 text-center text-lg-start pb-5 mb-5">
                            <h2 class="text-color-light font-weight-bold text-uppercase text-4 line-height-3 mb-2 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"
                                data-plugin-options="{'minWindowWidth': 0}"><span
                                    class="line-pre-title bg-color-light d-none d-lg-inline-block"></span>Discover the
                                hidden potential in your data</h2>
                            <h1 class="text-color-light font-weight-extra-bold text-10 line-height-2 pe-lg-5 me-lg-5 mb-3 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750"
                                data-plugin-options="{'minWindowWidth': 0}">ADVANCED DATA ANALYSIS</h1>
                            <p class="text-4 text-color-light font-weight-light mb-4 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000"
                                data-plugin-options="{'minWindowWidth': 0}">We turn your data into effective business
                                decisions.</p>
                            <a href="#"
                                class="btn btn-tertiary btn-modern font-weight-bold text-2 btn-py-3 px-5 mt-2 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1250"
                                data-plugin-options="{'minWindowWidth': 0}">GET STARTED</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel Slide 2 -->
            <div class="owl-item position-relative overflow-hidden">
                <div class="background-image-wrapper position-absolute top-0 left-0 right-0 bottom-0"
                    data-appear-animation="kenBurnsToRight" data-appear-animation-duration="30s"
                    data-plugin-options="{'minWindowWidth': 0}" data-carousel-onchange-show
                    style="background-image: url({{ asset('frontend/img/slides/slide-2.jpg') }}); background-size: cover; background-position: center;">
                </div>
                <div class="container position-relative z-index-3 pb-5 h-100">
                    <div class="row align-items-center justify-content-center justify-content-lg-end pb-5 h-100">
                        <div class="col-sm-9 col-lg-7 text-center text-lg-start pb-5 mb-5">
                            <h3 class="text-color-light font-weight-bold text-uppercase text-4 line-height-3 mb-2 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500"
                                data-plugin-options="{'minWindowWidth': 0}"><span
                                    class="line-pre-title bg-color-light d-none d-lg-inline-block"></span>Empowering
                                your business intelligence</h3>
                            <h2 class="text-color-light font-weight-extra-bold text-10 line-height-2 pe-lg-5 me-lg-5 mb-3 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750"
                                data-plugin-options="{'minWindowWidth': 0}">BUSINESS INTELLIGENCE SOLUTIONS</h2>
                            <p class="text-4 text-color-light font-weight-light mb-4 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1000"
                                data-plugin-options="{'minWindowWidth': 0}">Gain a competitive edge with custom
                                visualizations and models.</p>
                            <a href="#"
                                class="btn btn-primary btn-modern font-weight-bold text-2 btn-py-3 px-5 mt-2 appear-animation"
                                data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1250"
                                data-plugin-options="{'minWindowWidth': 0}">GET STARTED</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="owl-nav">
        <button type="button" role="presentation" class="owl-prev" aria-label="Previous"></button>
        <button type="button" role="presentation" class="owl-next" aria-label="Next"></button>
    </div>
</div>
@endsection
