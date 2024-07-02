@php
$school = app(App\Http\Controllers\SchoolController::class)->getSchool();
@endphp
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


  <!-- Page CSS -->
  <!-- Helpers -->
    <script src="{{asset('dashboard/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('dashboard/vendor/js/helpers.js') }}"></script>
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

  {{-- <script src="{{asset('dashboard/js/config.js')}}"></script> --}}

</head>
<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
          <div class="authentication-inner py-4">
            <!-- Login -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                          <!-- Logo -->
                          <div class="app-brand justify-content-center mb-4 mt-2">
                            <a href="javascript:void(0)" class="app-brand-link gap-2">
                                <img src="{{ asset($school->logo) }}" class="rounded-circle logo" width="80" height="90" alt="">
                              <span class="app-brand-text demo text-body fw-bold ms-1">School Management System</span>
                            </a>
                          </div>
                          <!-- /Logo -->
                          <h4 class="mb-1 pt-2">Welcome ! 👋</h4>
                          <p class="mb-4">Please sign-in to your account </p>

                          <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                              <label for="email" class="form-label">Email or Username</label>
                              <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                value=""
                                placeholder="Enter your email or username"
                                autofocus />
                                @error('email')
                                <span style="font-size:13px" class="mt-2 text-danger" >{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                              <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                  <small>Forgot Password?</small>
                                </a>
                                @endif
                              </div>
                              <div class="input-group input-group-merge">
                                <input
                                  type="password"
                                  id="password"
                                  value=""
                                  class="form-control"
                                  name="password"
                                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                  aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                              </div>
                              @error('password')
                                <span style="font-size:13px" class="mt-2 text-danger" >{{ $message }}</span>
                             @enderror
                            </div>
                            <div class="mb-3">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                              </div>
                            </div>
                            <div class="mb-3">
                              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                          </form>

                          <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="javascript:void(0)">
                              <span>Create an account</span>
                            </a>
                          </p>

                          <div class="divider my-4">
                            <div class="divider-text"></div>
                          </div>
                          <div class="row justify-content-center">
                            <div class="col-4">
                                <button class="btn btn-primary btn-sm" id="adminBtn" data-email="admin@admin.com" data-password="password">Admin</button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-sm" id="teachersBtn" data-email="teacher@gmail.com" data-password="password">Teacher</button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-primary btn-sm" id="accountantBtn" data-email="accountant@gmail.com" data-password="password">Accountant</button>
                            </div>

                            <div class="col-4 mt-2">
                                <button class="btn btn-primary btn-sm" id="guardianBtn" data-email="parent@gmail.com" data-password="password">Guardian</button>
                            </div>

                            <div class="col-4 mt-2">
                                <button class="btn btn-primary btn-sm" id="eoBtn" data-email="exams@gmail.com" data-password="password">Exam Officer</button>
                            </div>

                          </div>


                        </div>
                      </div>
                </div>
            </div>
            <!-- /Register -->
          </div>
        </div>
      </div>


  <script src="{{ asset('admin/js/core/jquery-3.6.0.js') }}"></script>
  <script src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
 <script src="{{asset('dashboard/vendor/libs/popper/popper.js')}}"></script>
 <script src="{{asset('dashboard/vendor/js/bootstrap.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/node-waves/node-waves.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/hammer/hammer.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/i18n/i18n.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/typeahead-js/typeahead.js')}}"></script>
 <script src="{{asset('dashboard/vendor/js/menu.js')}}"></script>

 <!-- endbuild -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <!-- Vendors JS -->
 <script src="{{asset('dashboard/vendor/libs/select2/select2.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/apex-charts/apexcharts.js')}}"></script>

 <script src="{{asset('dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/moment/moment.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/flatpickr/flatpickr.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/typeahead-js/typeahead.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/tagify/tagify.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>

 <script src="{{asset('dashboard/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/pickr/pickr.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/apex-charts/apexcharts.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/chartjs/chartjs.js')}}"></script>

 <!-- Main JS -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js')}}"></script>
 <script src="{{asset('dashboard/js/main.js')}}"></script>

 <script src="{{asset('dashboard/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
 <script src="{{asset('dashboard/js/forms-extras.js')}}"></script>

 <!-- Page JS -->
 <script src="{{asset('dashboard/js/tables-datatables-advanced.js')}}"></script>
 <script src="{{asset('dashboard/js/form-validation.js')}}"></script>
 <script src="{{asset('dashboard/js/forms-pickers.js')}}"></script>
 <script src="{{asset('dashboard/js/form-layouts.js')}}"></script>
 <script src="{{asset('dashboard/js/dashboards-crm.js')}}"></script>
 {{-- <script src="https://js.paystack.co/v1/inline.js"></script> --}}
 {{-- <script type="text/javascript" src="https://login.remita.net/payment/v1/remita-pay-inline.bundle.js"></script> --}}

{{-- @error('email')
 <script>
     const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });
  Toast.fire({
    icon: "warning",
    title: "{{ $message }}"
  });
 </script>
@enderror --}}

@if($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr.error("{{ $error }}", 'Warning');
    </script>
    @endforeach
@endif


@if(session()->has('success'))
<script>
    const Toast = Swal.mixin({
   toast: true,
   position: "bottom-end",
   showConfirmButton: false,
   timer: 3000,
   timerProgressBar: true,
   didOpen: (toast) => {
     toast.onmouseenter = Swal.stopTimer;
     toast.onmouseleave = Swal.resumeTimer;
   }
 });
 Toast.fire({
   icon: "success",
   title: "{{ session()->get('success') }}"
 });
</script>
@endif

<script>
     $(document).ready(function() {
        $('#adminBtn, #teachersBtn, #accountantBtn, #eoBtn, #guardianBtn').click(function() {
            var email = $(this).data('email');
            var password = $(this).data('password');

            $('#email').val(email);
            $('#password').val(password);
        });
    });
</script>

 </body>

 </html>

