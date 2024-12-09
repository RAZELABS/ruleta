<div class="menu-bar">
    <div class="container h-100">
        <img src="{{asset('img/logos/logo-fa.png')}}" class="menu-logo float-start" alt="Logo Falabella" />
        <a href=@isset($codigo_tienda)"https://www.ruletafalabella.com/?t={{$codigo_tienda}}" @else "" @endisset class="btn btn-menu-fb float-end mt-2" style="z-index: 100; display: block; position: relative;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="home-icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
            </svg>
            <span class="home-text">Salir</span>
        </a>
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
