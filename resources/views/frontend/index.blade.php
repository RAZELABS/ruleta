@extends('frontend.layouts.app')
@section('content')

<section id="overview" class="section bg-transparent border-0 py-5 m-0 p-relative">
    <div class="container pt-lg-5">
        <div class="row pt-lg-5">
            @include('frontend.partials.telefono')
            @include('frontend.partials.textos')
        </div>
    </div>

</section>

@endsection

