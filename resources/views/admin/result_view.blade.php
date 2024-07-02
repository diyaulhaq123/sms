@php
$school = app(App\Http\Controllers\SchoolController::class)->getSchool();
@endphp
<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="assets/dashboard/" data-template="horizontal-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>School Management System | Result</title>


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
  <link rel="stylesheet" href="{{asset('dashboard/vendor/libs/spinkit/spinkit.css') }}" />
  <style>
    @media print{
        .btn{
            display: none !important;
            background-color: white !important;
            color: white !important;
        }
        #fullscreenDiv{
            width: 100%;

        }

    }
  </style>

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
        <div class="col-lg-10" id="fullscreenDiv">
            <div class="d-flex justify-content-between" >
                <div class="btn-group mb-2">
                    <a href="{{  route('student.result') }}" class="btn btn-danger btn-sm">Back</a>
                    <button class="btn btn-primary btn-sm" id="printButton"><i class="ti ti-printer"></i></button>
                </div>
                <div class="">
                    <button class="btn btn-primary" id="fullscreenButton">Full Screen</button>
                </div>
            </div>
            <div class="card p-3">
                <div class="card-header">
                    <div class="row justify-content-center">
                        <div class="col-2"><img src="{{ asset($school->logo) }}" class="rounded-circle" alt="School logo" width="120px"></div>
                    </div>
                    <div class="text-center my-3">
                        <h5 class="text-uppercase"><strong>{{ $school->name }}</strong></h5>
                    </div>
                    {{-- style="border: 1px solid rgb(187, 184, 184); border-radius:10px" --}}
                    <hr>
                    <div class="row justify-content-between" >
                        <div class="col-lg-4 p-1" >
                            <p class="text-uppercase py-0">Name: {{ $student->last_name.' '.$student->first_name.' '.$student->other_name ?? '' }}</p>
                            <p class="py-0">Class: {{ $class->name.' '.request()->get('wing') }} </p>
                            <p class="py-0">Session: {{ $session->name }}</p>
                            <p class="py-0">Term: {{ $term->name }}</p>
                        </div>
                        <div class="col-4" >
                            <p>Total Points: </p>
                            <p class="">Average: </p>
                            <p>Position: </p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                   <table class="table">
                    <thead>
                        <tr class="text-bold">
                            <th>SN</th>
                            <th>Subject</th>
                            <th>CA 1</th>
                            <th>CA 2</th>
                            <th>CA 3</th>
                            <th>Exams</th>
                            <th>Total</th>
                            <th>Remark</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sn = 0;
                        @endphp
                        @forelse ($results as $row)
                        @for ($i=0; $i < 10; $i++)
                        <tr>
                            <td>{{ ++$sn }} </td>
                            <td>{{ $row->subject->name }}</td>
                            <td>{{ $row->ca1 }}</td>
                            <td>{{ $row->ca2 }}</td>
                            <td>{{ $row->ca3 }}</td>
                            <td>{{ $row->exam }}</td>
                            <td>{{ $row->total }}</td>
                            <td>{{ $row->remark }}</td>
                            @endfor
                        @empty

                        <td colspan=8 class="text-center"><div class="alert alert-danger">No results available</div></td>
                        </tr>
                        @endforelse

                    </tbody>
                   </table>
                   <div class="col-lg-3 mt-5">
                    <table class="table table-bordered">
                        <thead class="mt-5">
                            <tr>
                                <th><b>Punctuality</b></th>
                                <th><b>Attentiveness</b></th>
                                <th><b>Neatness</b></th>
                                <th><b>Confidence</b></th>
                            </tr>
                            <tr>
                                <td>{{ $performance->punctuality ?? 'NA' }}</td>
                                <td>{{ $performance->attendance ?? 'NA' }}</td>
                                <td>{{ $performance->neatness ?? 'NA' }}</td>
                                <td>{{ $performance->confidence ?? 'NA' }}</td>
                            </tr>
                        </thead>
                       </table>
                   </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{ asset('admin/js/core/jquery-3.6.0.js') }}"></script>
 <script src="{{asset('dashboard/vendor/libs/popper/popper.js')}}"></script>
 <script src="{{asset('dashboard/vendor/js/bootstrap.js')}}"></script>
 <script src="{{asset('dashboard/vendor/libs/node-waves/node-waves.js')}}"></script>


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

<script>
    $(document).ready(function() {
        $('#fullscreenButton').on('click', function() {
            var elem = document.getElementById("fullscreenDiv");
            if (!document.fullscreenElement &&    // alternative standard method
                !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {  // current working methods
                if (elem.requestFullscreen) {
                    elem.requestFullscreen();
                } else if (elem.msRequestFullscreen) {
                    elem.msRequestFullscreen();
                } else if (elem.mozRequestFullScreen) {
                    elem.mozRequestFullScreen();
                } else if (elem.webkitRequestFullscreen) {
                    elem.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }
        });


        $('#printButton').on('click', function() {
            var content = document.getElementById("fullscreenDiv").innerHTML;
            window.print(content);
        });

    });
    </script>

 </body>

 </html>

