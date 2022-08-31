<?php
if (!isset($_SESSION['username'])) {
    session_start();
}

if (!isset($_SESSION["username"])) {
    die("access not allowed");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RFAZ Textile | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{asset('template')}}/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('template')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('template')}}/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <!-- top Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item d-none d-sm-inline-block">
                    <label>&nbsp;&nbsp;</label>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <form action="/logout" class="d-flex">
                        <button style="height:30px;font-size:9pt" class="btn btn-outline-success" type="submit">Logout</button>
                    </form>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <form action="/user/editpassword/{{ $_SESSION['userid'] }}" class="d-flex">
                        <button style="height:30px;font-size:9pt" class="btn btn-outline-success" type="submit">Ubah Password</button>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <input class="form-control form-control-navbar" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->

            </ul>
        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="{{asset('template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">RFAZ Textile</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ $_SESSION['username'] . "/" . $_SESSION['role']}}</a>
                    </div>
                </div>


                @include('layout.v_nav')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                                @yield('title')
                            </h1>

                        </div>
                    </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                @yield('content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('template')}}/dist/js/demo.js"></script>
</body>

</html>

</script>