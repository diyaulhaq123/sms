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

  <script src="{{asset('dashboard/vendor/js/helpers.js') }}"></script>
  <!-- Core CSS -->
  <link rel="stylesheet" href="{{asset('dashboard/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{asset('dashboard/css/demo.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/css/sms.css') }}" />


  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/fullcalendar/fullcalendar.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/typeahead-js/typeahead.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/apex-charts/apex-charts.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/select2/select2.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/flatpickr/flatpickr.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/typeahead-js/typeahead.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/tagify/tagify.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/@form-validation/umd/styles/index.min.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/pickr/pickr-themes.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/apex-charts/apex-charts.css') }}" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/spinkit/spinkit.css') }}" />
  <link rel="stylesheet" href="{{asset('dashboard/vendor/css/pages/app-calendar.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- Page CSS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
  <!-- Helpers -->
    <script src="{{asset('dashboard/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <script src="{{asset('dashboard/js/config.js') }}"></script>
    @yield('heads')
</head>
<body>
    {{-- <div class="row py-4 loader justify-content-center">
        <div class="col-5 loader">
          <div class="sk-circle sk-primary">
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
            <div class="sk-circle-dot"></div>
          </div>
        </div>
    </div> --}}
<!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">


