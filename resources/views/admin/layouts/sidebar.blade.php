<!-- Sidebar de AdminKit -->
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar flex">

        <a class="sidebar-brand m-auto" href="{{ route('admin.dashboard') }}">
            <img class="align-middle img-fluid " src="{{asset('img/logos/banco-falabella.png')}}" width="150">
        </a>


        <ul class="sidebar-nav">
            <li class="sidebar-header py-0">
                <hr>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.detalle') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{ route('admin.detalle') }}">
                    <i class="fa-solid fa-gift"></i> <span class="align-middle">Consulta jugadas</span>
                </a>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.configuraciones') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{ route('admin.configuraciones') }}">
                    <i class="fa-solid fa-gear"></i> <span class="align-middle">Configuraciones</span>

                </a>
            </li>

            <!-- Agrega más enlaces según tus necesidades -->

        </ul>
    </div>
</nav>
