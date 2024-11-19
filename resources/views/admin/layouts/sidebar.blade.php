<!-- Sidebar de AdminKit -->
<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar flex">

        <a class="sidebar-brand m-auto" href="{{ route('admin.dashboard') }}">
            <img class="align-middle img-fluid " src="{{ asset('img/zyc_white.png') }}" width="100">
        </a>


        <ul class="sidebar-nav">
            <li class="sidebar-header py-0">
                <hr>
            </li>

            <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <!-- Agrega más enlaces según tus necesidades -->

            <li class="sidebar-item {{ request()->routeIs('admin.cotizaciones.index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.cotizaciones.index') }}">
                    <i class="align-middle" data-feather="image"></i> <span class="align-middle">Cotizaciones</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
