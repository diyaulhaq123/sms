@extends('layouts.view')
@section('page-title')
Edit Payment
@endsection
@section('card-header')
<p>Payment Type - ******* | Class - ******</p>
<p>Payment for session - ***** | Term - *******</p>
@endsection
@section('body')
<div class="row justify-content-center">
    <div class="card p-5 col-lg-8 col-md-8 col-sm-12 justify-content-center">
        <form action="#" method="post">
            @csrf
            <div class="row align-items-end">
                <div class="col-12 mb-2"><h5>Full Name</h5></div>
                <div class="col-md-4 my-1">
                        <label for="">Expected Amount</label>
                        <input type="text" class="form-control form-control-sm" name="" value="" placeholder="Amount" readonly>
                </div>
                <div class="col-md-4 my-1">
                        <label for="">Paid</label>
                        <input type="text" class="form-control form-control-sm" name="" value="" placeholder="Paid" readonly>
                </div>

                <div class="col-md-4 my-1">
                        <label for="">Balance</label>
                        <input type="text" class="form-control form-control-sm" name="" value="" placeholder="Balance" readonly>
                </div>

                <div class="col-md-4 my-1">
                    <label for="">Student Reg No</label>
                    <input type="text" class="form-control form-control-sm" name="" placeholder="Student Reg No" value="" readonly>
                </div>

                <div class="col-md-4 my-1">
                    <label for="">Payment Type</label>
                    <select class="form-control form-select-sm" name="payment_type_id" value="" readonly>
                        <option value="">- Select -</option>
                    </select>
                </div>

                <div class="col-md-4 my-1">
                    <label for="">Term</label>
                    <select class="form-control form-select-sm" name="term_id" value="" readonly>
                        <option value="">- Select -</option>
                    </select>
                </div>

                <div class="col-md-4 my-1">
                    <label for="">Session</label>
                    <select class="form-control form-select-sm" name="session_id" value="" readonly>
                        <option value="">- Select -</option>
                    </select>
                </div>

                <div class="col-md-3 col-sm-6 btn-group">
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                    <button type="submit" class="btn btn-info btn-sm"><i class="ti ti-printer"></i></button>
                </div>

            </div>

        </form>
    </div>
</div>
@endsection
