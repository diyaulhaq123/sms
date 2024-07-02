<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl">
      <div
        class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
        <div>
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>
          , made by <a href="https://hilinksnetworks.ng" target="_blank" class="fw-medium">Hilinks Networks Solutions</a>
        </div>

        </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->

<script src="{{ asset('dashboard/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{asset('dashboard/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('dashboard/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{asset('dashboard/vendor/js/menu.js')}}"></script>
<script src="{{asset('dashboard/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('dashboard/vendor/libs/node-waves/node-waves.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/select2/select2.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/apex-charts/apexcharts.js')}}"></script>
{{-- <script src="{{asset('dashboard/vendor/libs/typeahead-js/typeahead.js')}}"></script> --}}
{{-- <script src="{{asset('dashboard/vendor/libs/i18n/i18n.js')}}"></script> --}}
<script src="{{asset('dashboard/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/bootstrap-select/bootstrap-select.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/moment/moment.js')}}"></script>
{{-- <script src="{{asset('dashboard/vendor/libs/flatpickr/flatpickr.js')}}"></script> --}}
<script src="{{asset('dashboard/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/tagify/tagify.js')}}"></script>
{{-- <script src="{{asset('dashboard/vendor/libs/@form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/@form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/@form-validation/umd/plugin-auto-focus/index.min.js')}}"></script> --}}

<script src="{{asset('dashboard/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/jquery-timepicker/jquery-timepicker.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/pickr/pickr.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('dashboard/vendor/libs/chartjs/chartjs.js')}}"></script>

<script src="{{asset('dashboard/vendor/libs/fullcalendar/fullcalendar.js')}}"></script>

<script src="{{asset('dashboard/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script src="{{asset('dashboard/js/forms-extras.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('dashboard/js/tables-datatables-advanced.js')}}"></script>
{{-- <script src="{{asset('dashboard/js/form-validation.js')}}"></script> --}}
{{-- <script src="{{asset('dashboard/js/forms-pickers.js')}}"></script> --}}
<script src="{{asset('dashboard/js/form-layouts.js')}}"></script>
<script src="{{asset('dashboard/js/dashboards-crm.js')}}"></script>
<script src="{{asset('dashboard/js/sms.js')}}"></script>
{{-- <script src="{{asset('dashboard/js/app-calendar-events.js')}}"></script> --}}
{{-- <script src="{{asset('dashboard/js/app-calendar.js')}}"></script> --}}
<script src="https://js.paystack.co/v1/inline.js"></script>
{{-- <script type="text/javascript" src="https://login.remita.net/payment/v1/remita-pay-inline.bundle.js"></script> --}}

@yield('scripts')

<!-- Main JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
    $('.menu-toggle').click(function() {
        var submenu = $(this).closest('.menu-item').find('.menu-sub');
            submenu.slideToggle();
        });
    });

</script>

@if (session()->has('success'))
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
        icon: 'success',
        title: '{{ session()->get('success') }}'
    })
</script>
@endif


@if($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        toastr.error("{{ $error }}", 'Warning');
    </script>
    @endforeach
@endif


{{-- @if ($errors->any())
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
@endif --}}

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

<script>
    $(document).ready(function(){
        $('.add').click(function(){
            var id = $(this).data('id');
            var token = '{{ csrf_token() }}';
            $.post('{{ route('get.student') }}', { id:id, _token:token }, function(data){
                $('#student').html(data);
            });
        });

        $('.update').click(function(){
            var id = $(this).data('id');
            var token = '{{ csrf_token() }}';
            $.post('{{ route('get.grades') }}', { id:id, _token:token }, function(data){
                $('#student_update').html(data);
            });
        });

        $('.edit_performance').click(function(){
            var id = $(this).data('id');
            // var student_id = $('#student_id').val();
            var class_id = $('#class_id').val();
            var wing = $('#wing').val();
            var token = '{{ csrf_token() }}';
            $.post('{{ route('get.performance') }}', { id:id, _token:token, wing:wing, class_id:class_id }, function(data){
                $('#student_update').html(data);
            });
        });


    });

</script>

    <script>

        $(document).ready(function(){
            let table = new DataTable('#myTable');

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

            $('#edit').click(function(){
                let id = $(this).data('id');
                let token = "{{ csrf_token() }}"; // Ensure this is within Blade template context
                $.post("{{ route('edit.event') }}", { id: id, _token: token }, function(data){
                    $('#modalBody').html(data);
                });
            });

            $(".delete").click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to remove this record?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            $(".confirm").click(function(e) {
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you confirm that this ticket is resolved",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

        });
    </script>

<script>
    $(document).ready(function(){
        $('#reg').hide();
        $('#staff-select').hide();
        $('#task').change(function(){
            let task = $('#task').val();
            if(task == 'register'){
                $('#reg').show();
                $('#staff-select').hide();
                $('#staff_form').hide();

            }
             if(task == 'update_bio'){
                $('#staff-select').show();
                $('#reg').hide();
            }
        });

        $('#staff_id').change(function(){
            var id = $('#staff_id').val();
            var token = '{{ csrf_token() }}';
            $.post('{{ route('staff.id') }}', {id:id, _token:token}, function(data){
                $('#staff_form').html(data);
            });
        });



    });
</script>


</body>

</html>
