<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    @stack('title')
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset($data->favicon) }}" rel="icon">
    <link href="{{ asset($data->favicon) }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admins/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
        :root {
            --primary: {{ $data->primary }};
            --secondary: {{ $data->secondary }};
        }
    </style>
    <!-- Template Main CSS File -->
    <link href="{{ asset('admins/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admins/css/responsive.css') }}" rel="stylesheet">
    <style>
        /*faq-css------*/

        .faq-form ._table {
            width: 100%;
            border-collapse: collapse;
        }

        .faq-form ._table :is(th, td) {
            border: 1px solid #0002;
            padding: 8px 10px;
        }

        /* form field design start */

        .faq-form .form_control {
            border: 1px solid #0002;
            background-color: transparent;
            outline: none;
            padding: 8px 12px;
            font-family: 1.2rem;
            width: 100%;
            color: #333;
            font-family: Arial, Helvetica, sans-serif;
            transition: 0.3s ease-in-out;
        }

        .faq-form .form_control::placeholder {
            color: inherit;
            opacity: 0.5;
        }

        .faq-form .form_control:is(:focus, :hover) {
            box-shadow: inset 0 1px 6px #0002;
        }

        /* form field design end */

        .faq-form .success {
            background-color: #24b96f !important;
        }

        .faq-form .warning {
            background-color: #ebba33 !important;
        }

        .faq-form .primary {
            background-color: #259dff !important;
        }

        .faq-form .secondery {
            background-color: #00bcd4 !important;
        }

        .faq-form .danger {
            background-color: #ff5722 !important;
        }

        .faq-form .action_container {
            display: inline-flex;
        }

        .faq-form .action_container>* {
            border: none;
            outline: none;
            color: #fff;
            text-decoration: none;
            display: inline-block;
            padding: 8px 14px;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .faq-form .action_container>*+* {
            border-left: 1px solid #fff5;
        }

        .faq-form .action_container>*:hover {
            filter: hue-rotate(-20deg) brightness(0.97);
            transform: scale(1.05);
            border-color: transparent;
            box-shadow: 0 2px 10px #0004;
            border-radius: 2px;
        }

        .faq-form .action_container>*:active {
            transition: unset;
            transform: scale(.95);
        }
    </style>
    @stack('css')
    <link rel="stylesheet" href="{{ asset('admins/css/toastr.min.css') }}" />
    <script src="{{ asset('admins/js/toastr_jquery.min.js') }}"></script>
    <script src="{{ asset('admins/js/toastr.min.js') }}"></script>
</head>

<body>
    {!! Toastr::message() !!}
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset($data->logo_dark) }}" alt="">
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('admins/img/avatar.png') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
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
        <div class="mb-4">
            <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
                <span class="d-none d-lg-block text-dark ">
                    <img src="{{ asset($data->logo_dark) }}" alt="">
                </span>
            </a>
        </div>
        <ul class="sidebar-nav" id="sidebar-nav">
            @include('layout.admin_menus')
        </ul>
        <div class="sign-out-btn">
            <a class="nav-link collapsed fw-bold d-flex" href="{{ route('admin.logout') }}">
                <iconify-icon icon="mdi:logout" class="fs-4 me-2"></iconify-icon>
                <span>Sign Out</span>
            </a>
        </div>

    </aside><!-- End Sidebar-->


    @yield('admin')


    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            <p> &copy; Copyright <strong><span>{{ $data->site_name }} </span></strong>. All Rights Reserved.
                <span class="credits"> Designed by <strong><a
                            href="https://zonewebsites.us/">Zonewebsites</a></strong></span>
            </p>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('admins/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admins/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admins/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admins/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admins/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admins/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admins/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admins/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('admins/js/main.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.0.0/classic/ckeditor.js"></script>

    <script>
        // //text-editor
        // const createClassicEditor = id => {
        //     ClassicEditor
        //         .create(document.getElementById(id))
        //         .catch(error => {
        //             // console.error(error);
        //         });
        // };

        // //loop for editor
        // for (let i = 1; i <= 200; i++) {
        //     createClassicEditor(`editor${i}`);
        // }
    </script>
    @stack('js')
</body>

</html>
