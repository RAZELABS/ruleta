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

        <div class="col-12 col-md-12 px-3 mt-4">
            <div class="row bg-configuracion b-radius-20 px-2 mt-3 mt-md-0">
                <div class="col-12 px-4 pt-2 text-center font-weight-bolder text-secondary">Distribución de Ganadores y premios</div>

                {{-- distribucion de ganadores --}}
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('admin.matrizdia.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-calendar-day"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">x Dia</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('admin.matrizturno.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-clock"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">x Turno</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('admin.matriztienda.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-shop"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">x Tienda</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('admin.premios.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-hand-holding-dollar"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">Premios</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('admin.tiendapremio.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-gifts"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">Premios x tienda</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-12 px-3 mt-4">
            <div class="row bg-configuracion b-radius-20 px-2 mt-3 mt-md-0">
                <div class="col-12 px-4 pt-2 text-center font-weight-bolder text-secondary">Usuarios, roles y permisos</div>

                {{-- usuarios y roles --}}
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('users.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-users"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">Usuarios</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('roles.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-person-circle-check"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">Roles</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="featured-boxes  m-0 ">
                        <div class="featured-box my-2 b-radius-20 ">
                            <a href="{{ route('permissions.index') }}" class="text-decoration-none">
                                <span class="p-1 text-center d-block">
                                    <span class="text-secondary display-5"><i class="fa-solid fa-unlock-keyhole"></i></span>
                                    <span class="font-weight-bold    d-block text-secondary">Permisos</span>
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
