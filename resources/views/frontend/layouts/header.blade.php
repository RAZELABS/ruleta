<div class="menu-bar">
    <div class="container h-100">
        <div class="row align-items-center g-2">
            <div class="col-6">
                <img src="{{asset('img/logos/logo-fa.png')}}" class="menu-logo float-start" alt="Logo Falabella" />
            </div>
            <div class="col-6 text-right ">
                <a href=@if(isset($codigo_tienda))"https://www.ruletafalabella.com/?t={{$codigo_tienda}}"
                    @else "{{route('home')}}" @endif class="mb-1 mt-1 me-1 btn btn-outline-secondary float-end"><i
                        class="fas fa-home"></i> Salir</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid banner-superior">
    <div class="row h-100">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-md-6 p-4 h-100">
                    <img src="{{asset('frontend/img/logos/CONVALES-07.png')}}" class="img-fluid h-100 w-100 img-cover"
                        alt="" />
                </div>
                <div class="col-12 col-md-6 p-0 h-100">
                    <img src="{{asset('frontend/img/elementos/modelo.jpg')}}"
                        class="modelo img-fluid h-100 w-100 img-cover d-none d-md-block" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid barra-colores">

</div>
