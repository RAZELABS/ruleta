@extends('admin.layouts.app')
@section('content')
<div class="container p-3">
    <div class="row mt-3">
        <div class="col-12 col-md-12 px-3">
            <div class="row bg-configuracion b-radius-20 px-2 mt-3 mt-md-0">
                <div class="col-12 px-4 pt-2 text-center font-weight-bolder text-secondary">Información General</div>

                {{-- parametros generales --}}
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('admin.parametros.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fas fa-file-circle-check"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">Parametros</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('admin.tienda.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-store"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">Tiendas</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
