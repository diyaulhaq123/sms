@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
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

@if (session()->has('success_allocation'))
<script>
    Swal.fire(){
        'text': '{{ session()->get('success_allocation') }}',
        'icon' : 'success',
        'title': 'Success'
    }
</script>
@endif

@if (session()->has('success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
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

@if (session()->has('error'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
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
    $(document).ready(function() {
    // When the "select all" checkbox is clicked
    $('#selectAll').click(function() {
        // Select all row checkboxes if the "select all" checkbox is checked
        $('.rowCheckbox').prop('checked', $(this).prop('checked'));
    });

});
</script>
 <script>

 $(document).ready(function () {
     $('#state_id').on('change', function () {
         var state = $('#state_id').val();
         $.ajax({
             type: 'POST',
             url: '{{ route('fetch.lga') }}',
             data: {
                 _token: '{{ csrf_token() }}',
                 state_id: state,
             },
             success: function (data) {
                 $('#lga_id').html(data);
             },
             error: function (error) {
                 console.error(error);
             }
         });
     });


     $('.class_category').on('change', function () {
     var category = $(this).val();
     var row = $(this).closest('tr');
     var classSelect = row.find('.class_id');

     $.ajax({
         type: 'POST',
         url: '{{ route('fetch.classes') }}',
         data: {
             _token: '{{ csrf_token() }}',
             category: category,
         },
         success: function (data) {
             classSelect.html(data);
         },
         error: function (error) {
             console.error(error);
         }
     });
 });

 $('#class_category_id').on('change', function () {
     var category = $('#class_category_id').val();

     $.ajax({
         type: 'POST',
         url: '{{ route('fetch.classes') }}',
         data: {
             _token: '{{ csrf_token() }}',
             category: category,
         },
         success: function (data) {
             $('#class_id').html(data);
         },
         error: function (error) {
             console.error(error);
         }
     });
 });


 });


 function printresult(elem) {
     var header_str = '<html><head><title>' + document.title  + '</title></head><body style="padding:30px">';
     var footer_str = '</body></html>';
     var new_str = document.getElementById(elem).innerHTML;
     var old_str = document.body.innerHTML;
     document.body.innerHTML = header_str + new_str + footer_str;
     window.print();
     document.body.innerHTML = old_str;
     return false;
 }


     $(document).on('click', '.submit-button', function() {
         var row = $(this).closest('tr'); // To the closest table row
         var form = row.find('.my-form'); // To the form within the row

         $.ajax({
             url: '{{ route('allocate.subject') }}', //
             type: 'POST',
             data: form.serialize(), // Serializing the form data
             success: function(response) {

                 console.log(response);
             },
             error: function(error) {

                 console.error(error);
             }
         });
     });


     $(document).on('click', '.submit-button', function() {
         var row = $(this).closest('tr'); // Get the closest table row
         var form = row.find('.my-form'); // Find the form within the row

         $.ajax({
             url: '{{ route('get.result') }}', // Replace with your Laravel route
             type: 'POST',
             data: form.serialize(), // Serialize the form data
             success: function(response) {
                 // Handle success response if needed
                 console.log(response);
             },
             error: function(error) {
                 // Handle error if needed
                 console.error(error);
             }
         });
     });


</script>
