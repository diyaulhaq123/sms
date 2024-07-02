@extends('layouts.view')
@section('page-title')
Make Payment
@endsection
@section('card-header')
Students
@endsection
@section('body')
<div class="col-5">
        <button type="button" class="btn btn-success" onclick="payWithMonnify()">Pay With Monnify</button>
</div>
<form action="{{ route('info.make.payment') }}" method="post">
    @csrf
    <div class="row d-flex align-items-end">
        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
            <label for="">Class Category</label>
            <select type="select" class="form-control select2" name="class_category_id" id="class_category_id">
                <option value="">Select Category</option>
                @foreach ($categories as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
            <label for="">Class</label>
            <select type="select" class="form-control" name="class_id" id="class_id">
                <option value="">Select Class</option>
                @foreach ($classes as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
            <label for="">Wing</label>
            <select type="select" class="form-control" name="wing" id="wing">
                <option value="">Select Wing</option>
                @foreach ($wings as $row)
                <option value="{{ $row->name }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 my-2">
            <label for="">Students</label>
            <select type="select" class="form-control select2" name="student_id" id="student_id">
                <option value="">Student</option>
            </select>
        </div>
    </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <button class="btn btn-success btn-md waves-effect waves-light"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>

    </div>
</form>


<script>
    $(document).ready(function(){

        $('#class_id, #wing').change(function(){
            var wing = $('#wing').val();
            var class_id = $('#class_id').val();
            var token = '{{ csrf_token() }}';
            $.post('{{ route('get.students') }}', {wing:wing, class_id:class_id, _token:token}, function(data){
                $('#student_id').html(data);
            });
        });

    });
</script>
@endsection

@if ($student)

@php
    $ref = 'REF'.mt_rand(1, 10000000000);
@endphp

@section('second-card')
<div class="card mx-4">
    <div class="card-body row justify-content-center p-3">
        <div class="card-title">
            
        </div>
        <div class=" p-3 col-lg-10 col-md-8 col-sm-12 justify-content-center">
            <form action="{{ route('create.payment') }}" method="post">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <input type="hidden" name="guardian_id" value="{{ $student->guardian_id }}">
                <input type="hidden" name="class_id" value="{{ $student->class_id }}">
                <input type="hidden" name="ref_no" value="{{ $ref }}">
                <div class="row align-items-end">
                    <div class="row mb-2">
                        <h5 class="col-4">Name : {{ $student->last_name.' '.$student->first_name }}</h5>
                        <h5 class="col-4">Class : {{ $student->class->name }}</h5>
                        <div class="col-4" style="float:right">
                            <span>Payment medium <i style="font-size:12px">(default:online)</i></span><br>
                            <label for="" style="font-size:13px">Offline</label>
                            <input type="radio" class="" name="medium"  id="medium" value="0">
                            <label for="" style="font-size:13px">Online</label>
                            <input type="radio" checked class="" name="medium"  id="medium" value="1">
                        </div>
                    </div>

                    <div class="col-md-4 my-1">
                        <label for="">Payment Type</label>
                        <select class="form-select  form-select-sm" name="payment_type_id" id="payment_type_id" value="">
                            <option value=""> Select </option>
                            @foreach ($payment_types as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 my-1">
                        <label for="">Term</label>
                        <select class="form-select form-select-sm" name="term_id" id="term_id" value="">
                            <option value=""> Select </option>
                            @foreach ($terms as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 my-1">
                        <label for="">Session</label>
                        <select class="form-select form-select-sm" name="session_id" id="session_id" value="">
                            <option value=""> Select </option>
                            @foreach ($sessions as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 my-1">
                        <label for="">Student Classes</label>
                        <select class="form-select form-select-sm" name="student_classes" id="student_classes">
                            <option value="">Select</option>
                            @foreach ($student_classes as $row)
                                <option value="{{ $row->id ?? '' }}">{{ $row->name ?? '' }}</option>
                            @endforeach
                        </select>
                        {{-- <label for="">Student Reg No</label>
                        <input type="text" class="form-control form-control-sm" name="reg_no" placeholder="Student Reg No" value="{{ $student->admission_no }}" readonly> --}}
                    </div>
                    <div class="col-md-4 my-1" id="paid">
                        <label for="">Amount paying</label>
                        <input type="text" class="form-control form-control-sm" name="paid" id="paid" value="" placeholder="Paid" >
                    </div>

                    <div class="col-md-4 my-1" id="pay_info">
                   </div>

                    <div class="col-md-3 col-sm-6 mt-2">
                        <button type="submit" class="btn btn-success btn-sm">Proceed Payment</button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection

@endif

@section('scripts')
    <script>
       $(document).ready(function(){
            $('#payment_type_id, #term_id, #session_id, #student_classes').change(function(){
                var payment_type_id = $('#payment_type_id').val();
                var term_id = $('#term_id').val();
                var session_id = $('#session_id').val();
                var student_classes = $('#student_classes').val();
                var token = '{{ csrf_token() }}'; // Ensure this line is correctly interpreted by the server-side templating engine.

                $.post('payment/details', {
                    payment_type_id: payment_type_id,
                    term_id: term_id,
                    session_id: session_id,
                    student_classes:student_classes,
                    _token: token
                }, function(data){
                    $('#pay_info').html(data);
                });
            });
            $('#paid').hide();

            $('#medium').change(function(){
                var medium = $('#medium').val();
                if (medium == 0) {
                    $('#paid').show();
                } else {
                    $('#paid').hide(); // Optional: Hide the element if medium is not 0
                }
            });


        });


    </script>

<script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
<script>
    function payWithMonnify() {
        MonnifySDK.initialize({
            amount: 100,
            currency: "NGN",
            reference: new String((new Date()).getTime()),
            customerFullName: "Damilare Ogunnaike",
            customerEmail: "ogunnaike.damilare@gmail.com",
            apiKey: "MK_TEST_LSB8PVX5N4",
            contractCode: "8676269291",
            paymentDescription: "Lahray World",
            metadata: {
                "name": "Damilare",
                "age": 45
            },
            incomeSplitConfig: [{
                "subAccountCode": "MFY_SUB_342113621921",
                "feePercentage": 50,
                "splitAmount": 1900,
                "feeBearer": true
            }, {
                "subAccountCode": "MFY_SUB_342113621922",
                "feePercentage": 50,
                "splitAmount": 2100,
                "feeBearer": true
            }],
            onLoadStart: () => {
                console.log("loading has started");
            },
            onLoadComplete: () => {
                console.log("SDK is UP");
            },
            onComplete: function(response) {
                //Implement what happens when the transaction is completed.
                console.log(response);
            },
            onClose: function(data) {
                //Implement what should happen when the modal is closed here
                console.log(data);
            }
        });
    }
</script>

@endsection
