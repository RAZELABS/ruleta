<!-- Navbar de AdminKit -->
<nav class="navbar navbar-expand navbar-light navbar-bg">
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Usuarios
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @hasanyrole('superadmin|admin')
                    <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">Lista de Usuarios</a></li>
                    @endhasanyrole
                    @hasrole('superadmin')
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Roles de Usuario</a></li>
                    <li><a class="dropdown-item" href="#">Permisos de Usuario</a></li>
                    @endhasrole
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>
                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                    {{-- <img src="{{ asset('admin/img/avatar.png') }}" class="avatar img-fluid rounded me-1"
                        alt="User" /> --}}
                    <span class="text-dark">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}"><i class="align-middle me-1"
                            data-feather="user"></i> Perfil</a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="align-middle me-1" data-feather="log-out"></i> Cerrar sesión
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
