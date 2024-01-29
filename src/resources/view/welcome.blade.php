@php
    $routeName = Illuminate\Support\Facades\Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel - Bank</title>

    {{--  favicon path  --}}
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/3096/3096985.png" type="image/x-icon">

    {{--  bootstrap 5 css cdn link  --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{--  fontawsome 4.7.0 cdn link  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{--  theme css link  --}}
    <link href="{{ asset('vendor/bankreconciliation/css/theme.css') }}" rel="stylesheet">

    <style>
        .act {
            color: #4154f1;
            border-left: 2px solid #4154f1;
            border-right: 2px solid #4154f1;
        }

        .btn-primary {
            background: #4153f1;
        }

        .col {
            text-transform: uppercase;
        }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3096/3096985.png" alt="">
                <span class="d-none d-lg-block">BANK</span>
            </a>
            <i class="fa fa-bars toggle-sidebar-btn" style="font-size: 20px"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="fa fa-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="https://t4.ftcdn.net/jpg/02/29/75/83/360_F_229758328_7x8jwCwjtBMmC6rgFzLFhZoEpLobB6L8.jpg"
                            alt="Profile" class="rounded-circle" style="height: 50px; width: 35px">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Admin</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed {{ $routeName == 'dashboard' ? 'act' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed {{ $routeName == 'file.list' || $routeName == 'file.upload' || $routeName == 'file.view' ? 'act' : '' }}"
                    href="{{ route('file.list') }}">
                    <i class="fa fa-file-excel-o"></i>
                    <span>Transaction File</span>
                </a>
            </li><!-- End menu Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed {{ $routeName == 'bank.list' || $routeName == 'bank.upload' || $routeName == 'bank.file.view' ? 'act' : '' }}"
                    href="{{ route('bank.list') }}">
                    <i class="fa fa-file-excel-o"></i>
                    <span>Bank Data File</span>
                </a>
            </li><!-- End menu Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('reconciliation.list') }}">
                    <i class="fa fa-compress"></i>
                    <span>Reconciliation</span>
                </a>
            </li><!-- End menu Page Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa fa-sitemap"></i><span>dropmenu</span><i class="fa fa-angle-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="#">
                            <i class="fa fa-circle"></i><span>droplink 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle"></i><span>droplink 2</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-circle"></i><span>droplink 3</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        {{--  fatch all extended blade file hear  --}}
        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Bank Reconciliation</span></strong>. All Rights Reserved
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="fa fa-level-up"></i></a>

</body>

{{--  bootstrap 5 javascript cdn link  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

{{--  jquery 3.7.1 cdn link  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.slim.min.js"
    integrity="sha512-sNylduh9fqpYUK5OYXWcBleGzbZInWj8yCJAU57r1dpSK9tP2ghf/SRYCMj+KsslFkCOt3TvJrX2AV/Gc3wOqA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{--  theme javascript link  --}}
<script src="{{ asset('vendor/bankreconciliation/js/theme.js') }}"></script>

</html>
