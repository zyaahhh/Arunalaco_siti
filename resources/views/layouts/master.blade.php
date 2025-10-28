<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Arunala & Co Dashboard</title>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">

    <!-- Layout CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- Custom Dark Purple Theme -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
</head>

<body>
<div class="container-scroller">

    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <a class="navbar-brand brand-logo" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="{{ url('/') }}">
                <img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo mini" />
            </a>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>

            <ul class="navbar-nav navbar-nav-right">
                <!-- Profile -->
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown">
                        <div class="nav-profile-img">
                            <img src="{{ asset('assets/images/faces/9.jpg') }}" alt="image">
                            <span class="availability-status online"></span>
                        </div>
                        <div class="nav-profile-text">
                            <p class="mb-1 text-white">Arunala & Co</p>
                        </div>
                    </a>
                    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="#"><i class="mdi mdi-cached me-2 text-success"></i> Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-logout me-2 text-primary"></i> Signout</a>
                    </div>
                </li>

                <!-- Notifications -->
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="count-symbol bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <h6 class="p-3 mb-0">Notifications</h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-icon bg-success"><i class="mdi mdi-calendar"></i></div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject mb-1">Event today</h6>
                                <p class="text-gray mb-0">Just a reminder that you have an event today</p>
                            </div>
                        </a>
                    </div>
                </li>

                <!-- Logout -->
                <li class="nav-item nav-logout d-none d-lg-block">
                    <a class="nav-link" href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            @include('layouts.sidebar')
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>

            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block d-sm-inline-block">
                        © 2025 Arunala & Co. All rights reserved.
                    </span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                        Made with <i class="mdi mdi-heart text-danger"></i>
                    </span>
                </div>
            </footer>
        </div>
    </div>
</div>

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
@if (session('success'))
Swal.fire({
    icon: "success",
    title: "Berhasil",
    text: "{{ session('success') }}",
    showConfirmButton: true
});
@elseif (session('error'))
Swal.fire({
    icon: "error",
    title: "Gagal!",
    text: "{{ session('error') }}",
    showConfirmButton: true
});
@endif
</script>

@stack('scripts')
</body>
</html>
