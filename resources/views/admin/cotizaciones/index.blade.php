@extends('admin.layouts.app')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">

        <div class="col-md-12">
            @include('admin.cotizaciones.partials.formulario-cotizacion')
        </div>
        <div class="col-md-12">
            @include('admin.cotizaciones.partials.tabla-cotizaciones')
        </div>

    </div>

</div>
@endsection