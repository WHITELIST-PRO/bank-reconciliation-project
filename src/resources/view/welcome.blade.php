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
    <link href="{{ asset('vendor/bankreconciliation/css/custom.css') }}" rel="stylesheet">

    {{--  jquery 3.7.1 cdn link  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{--  bootstrap 5.0.2 cdn link  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>

    <div class="loading-overlay">
        <div class="loading-spinner">

        </div>
        <div class="loading-text">
            Please wait, loading...
        </div>
    </div>

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

                <li class="nav-item dropdown pe-3">

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
                <a class="nav-link collapsed {{ $routeName == 'reconciliation.list' ? 'act' : '' }}"
                    href="{{ route('reconciliation.list') }}">
                    <i class="fa fa-compress"></i>
                    <span>Reconciliation</span>
                </a>
            </li><!-- End menu Page Nav -->

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

<script src="{{ asset('vendor/bankreconciliation/js/theme.js') }}"></script>

<script>
    $(document).ready(function () {
        setTimeout(function () {

            // Fade in duration: 1 second
            $(".content").fadeIn(1000);
            $(".loading-overlay").fadeOut(1000);

            // Fade out duration: 1 second
            // Display loading overlay for 1 second
        }, 1000);
    });
</script>

</html>
