<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Dashboard - SB Admin</title>
        <link href="{{ asset('css/library/dataTables.bootstrap4.min.css') }}" rel="stylesheet" crossorigin="anonymous" />
        <link href="{{ asset('admin/css/library/template.css') }}" rel="stylesheet" />
        <link href="{{ asset('admin/css/custom/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom/base.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand base-bg-gray">
            <a class="navbar-brand text-muted" href="/">D A S H  B O A R D</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0 base-cl-primary" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form> -->
            <!-- Navbar-->
            <ul class="navbar-nav d-md-inline-block form-inline ml-auto mr-0 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle base-cl-primary" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="/admin/user/edit/{{session()->get('CurrentUser')->id}}">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            @include('admin.slidebar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('admin-content')
                </main>
            </div>
        </div>
        
        <script src="{{ asset('js/library/jquery-3.5.1.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/library/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/library/jquery.dataTables.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/library/dataTables.bootstrap4.min.js') }}" crossorigin="anonymous"></script>
        <script src="{{ asset('js/library/font-awesome-5.13.0.all.min.js') }}"></script>
        <script src="{{ asset('admin/js/library/start-bootstrap.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        @yield('admin-script')
    </body>
</html>
