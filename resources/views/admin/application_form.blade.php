<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="assets/dashboard/" data-template="horizontal-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>School Management System | Applications</title>


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

<div class="container p-5">
    <div class="row justify-content-center mt-3">
        <div class="col-lg-8">
            <a href="{{  route('login') }}" class="btn btn-info">Click to go back</a>
            <div class="card">
                <div class="card-header">
                    <h4>Applications</h4>
                </div>
                <div class="card-body justify-content-center">
                    <div class="card-title"> <marquee> Apply for Admissions for session 2023/24 has began fill the form below to apply for admissions, Thank You!</marquee></div>
                    {{-- <div class="col-lg-8"> --}}
                        {{-- <div class="row"> --}}
                            <form action="{{ route('application.create') }}" method="post">
                                @csrf
                                <input type="hidden" name="session_id" value="{{ $session->session_id }}">
                                <div class="row align-items-end ">
                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for=""> First name</label>
                                            <input type="text" class="form-control" name="first_name" placeholder="First name">
                                            @error('first_name')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for=""> Last name</label>
                                            <input type="text" class="form-control" name="last_name" placeholder="Last name">
                                            @error('last_name')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for=""> Other name</label>
                                            <input type="text" class="form-control" name="other_name" placeholder="Other name">
                                            @error('other_name')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">Gender</label>
                                            <select  class="form-control form-select" name="gender" >
                                                <option value="">Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            @error('gender')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">State Of origin</label>
                                            <select class="form-control form-select select2" name="state_id" id="state_id">
                                                <option value="">State</option>
                                                @foreach ($states as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach

                                            </select>
                                            @error('state_id')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">LGA</label>
                                            <select class="form-control form-select" name="lga_id" id="lga_id">
                                                <option value="">LGA</option>
                                            </select>
                                            @error('lga_id')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">Date Of Birth</label>
                                            <input type="date" class="form-control datepicker" name="date_of_birth" >
                                            @error('date_of_birth')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">Class category</label>
                                            <select class="form-control form-select" name="class_category_id" id="class_category_id">
                                                <option value="">Category</option>
                                                @foreach ($class_category as $row)
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_category_id')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">Class</label>
                                            <select class="form-control form-select" name="class_id" id="class_id">
                                                <option value="">Class</option>
                                            </select>
                                            @error('class_id')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">Guardian Name</label>
                                            <input type="text" class="form-control" name="guardian_name" placeholder="Guardian Name">
                                            @error('guardian_name')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">Guardian Phone No</label>
                                            <input type="text" class="form-control" name="guardian_phone" placeholder="Guardian Phone">
                                            @error('guardian_phone')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">Guardian Email</label>
                                            <input type="email" class="form-control" name="guardian_email" placeholder="Guardian Email">
                                            @error('guardian_email')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 my-2">
                                            <label for="">Home Address</label>
                                            <textarea class="form-control" name="address" id="" cols="30" rows="3"></textarea>
                                            @error('address')
                                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="col-3 col-sm-6 mt-2">
                                            <button class="btn btn-success mb-2">Submit </button>
                                        </div>
                                </div>

                            </form>
                        {{-- </div> --}}
                    {{-- </div> --}}
                </div>
            </div>
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

<script>
    $(document).ready(function(){
        $('#class_category_id').change(function(){
            var id = $('#class_category_id').val();
            var token = '{{ csrf_token() }}';
            $.post('{{ route('get.class') }}', { id: id, _token: token }, function (data) {
                $('#class_id').html(data);
            });
        });

        $('#state_id').change(function(){
            var id = $('#state_id').val();
            var token = '{{ csrf_token() }}';
            $.post('{{ route('get.lga') }}', { id: id, _token: token }, function (data) {
                $('#lga_id').html(data);
            });
        });
    });
</script>

 @if ($errors->any())
 @foreach ($errors->all() as $error)
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
         title: '{{ $error }}'
     })
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

@if(session()->has('error'))
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
   icon: "error",
   title: "{{ session()->get('error') }}"
 });
</script>
@endif


 </body>

 </html>

