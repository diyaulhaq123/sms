<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="assets/dashboard/" data-template="horizontal-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>School Management System</title>


    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5J3LMKC');</script>
    <!-- End Google Tag Manager -->

    {{-- <link rel="icon" type="image/x-icon" href="{{asset('dashboard/img/icon.png') }}" /> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('dashboard/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard/vendor/fonts/tabler-icons.css') }}"/>
    <link rel="stylesheet" href="{{asset('dashboard/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('dashboard/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('dashboard/css/demo.css') }}" />


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/vendor/css/pages/app-calendar.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/node-waves/node-waves.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
    <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/spinkit/spinkit.css') }}" />


    <!-- Page CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Helpers -->
    <script src="{{asset('dashboard/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{asset('dashboard/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <script src="{{asset('dashboard/js/config.js') }}"></script>

</head>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container justify-content-center align-content-center">



        <div class="row ">
            <div class="col-12 justify-content-center" style="margin-left: auto; margin-right: auto">
                <center>
                    <div class="misc-wrapper">
                        <h2 class="mb-1 mt-4">Invalid Request Type :</h2>
                        <p class="mb-4 mx-2">Oops! 😖 There was an issue with request type.</p>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary mb-4 waves-effect waves-light">Back to home</a>
                        <div class="mt-4" style="max-width: 800px">
                            <img src="{{asset('dashboard/img/page-misc-error.png.jpg') }}" alt="page-misc-error" width="50%" class="img-fluid">
                        </div>
                    </div>
                </center>
            </div>
        </div>




        <div class="content-backdrop fade"></div>
    </div>

</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{ asset('dashboard/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{asset('dashboard/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('dashboard/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/node-waves/node-waves.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/hammer/hammer.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('dashboard/js/main.js')}}"></script>

@if (session()->has('validate'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'warning',
        title: '{{ session()->get('validate') }}'
    })
</script>
@endif


@if (session()->has('error'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'error',
        title: '{{ session()->get('error') }}'
    })
</script>
@endif

</body>

</html>
