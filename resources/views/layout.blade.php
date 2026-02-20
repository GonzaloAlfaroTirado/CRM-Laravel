<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Pro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <div class="d-flex" id="wrapper">

        {{-- Sidebar --}}
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-brand text-center py-4">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="CRM" class="sidebar-logo">
                </a>
            </div>

            <ul class="sidebar-nav">
                <li><a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}"><i class="bi bi-house-door-fill"></i> Inicio</a></li>
                <li><a href="{{ route('clientes.index') }}" class="{{ Request::is('clientes*') ? 'active' : '' }}"><i class="bi bi-people-fill"></i> Clientes</a></li>
                <li><a href="{{ route('productos.index') }}" class="{{ Request::is('productos*') ? 'active' : '' }}"><i class="bi bi-box-seam-fill"></i> Productos</a></li>
                <li><a href="{{ route('proveedores.index') }}" class="{{ Request::is('proveedores*') ? 'active' : '' }}"><i class="bi bi-truck-front-fill"></i> Proveedores</a></li>
                <li><a href="{{ route('empleados.index') }}" class="{{ Request::is('empleados*') ? 'active' : '' }}"><i class="bi bi-person-badge-fill"></i> Empleados</a></li>
                <li><a href="{{ route('categorias.index') }}" class="{{ Request::is('categorias*') ? 'active' : '' }}"><i class="bi bi-tags-fill"></i> Categorías</a></li>

                @if(Auth::user()->isAdmin())
                <li class="sidebar-section-title text-uppercase text-muted small px-3 mt-3">Administración</li>
                <li><a href="{{ route('usuarios.index') }}" class="{{ Request::is('usuarios*') ? 'active' : '' }}"><i class="bi bi-shield-person-fill"></i> Usuarios & Roles</a></li>
                @endif
            </ul>
        </div>

        {{-- Content --}}
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-white mb-4 shadow-sm rounded">
                <div class="container-fluid">
                    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        <li class="nav-item me-2 d-flex align-items-center">
                            @if(Auth::user()->isAdmin())
                                <span class="badge bg-danger"><i class="bi bi-shield-fill me-1"></i>Admin</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-person-fill me-1"></i>Usuario</span>
                            @endif
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1 text-primary"></i>
                                {{ Auth::user()->name ?? 'Usuario' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="bi bi-person me-2"></i> Mi Perfil</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.settings') }}"><i class="bi bi-gear me-2"></i> Configuración</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-x-circle-fill me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- jQuery + DataTables --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    @stack('scripts')
</body>
</html>
