<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script>
</head>

<body id="page-top">
    <style>
    .img-respon{
        object-fit: cover;
        object-position: center;
        max-width: 100%;
        height: 350px;
    }
</style>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon">
                    <img src="{{url('storage/logo/sena.svg')}}" width="40px" height="40px">
                </div>
                <div class="sidebar-brand-text mx-3">SENA<sup>2020</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @if(@Auth::user()->hasRole('evaluator'))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            @endif


            @if(@Auth::user()->hasRole('admin'))
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Componentes</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/carousel/create">Carrusel</a>
                        <a class="collapse-item" href="/speaker/create">Conferencista</a>
                        <a class="collapse-item" href="/calendar/create">Cronograma</a>
                        <a class="collapse-item" href="/ally/create">Aliados</a>
                    </div>
                </div>
            </li>
             <li class="nav-item">
                <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Reportes</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="assistan">Asistentes</a>
                        <a class="collapse-item" href="institution">Sede</a>
                        <a class="collapse-item" href="dependence">Dependencia</a>
                        <a class="collapse-item" href="provider">Proveedor</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            @endif

            <!-- Divider -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                            <img class="img-profile rounded-circle" src="{{ url('/storage/logo/no-avatar.png') }}">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Cerrar Sesi&oacute;n
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            <!-- Begin Page Content -->
            <main class=" py-4">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </main>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SENA 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    @component('components.modal')
    @slot('title')
    Cerrar sesi&oacute;n
    @endslot
    @slot('body')
    <h3>¿Esta seguro que desea cerrar sesion?</h3>
    @endslot
    @slot('footer')
    <a href="/logout" class="btn btn-primary">Cerrar Sesi&oacute;n</a>
    @endslot

    @endcomponent

    @yield('scripts')
</body>

</html>
