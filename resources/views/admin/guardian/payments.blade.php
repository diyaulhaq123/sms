@extends('layouts.view')
@section('page-title')
Payments
@endsection
@section('card-header')
My Payments
@endsection
@section('body')
{{-- <form action="" method="post">
    @csrf
    <div class="row d-flex align-items-end">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <label for="">Search/Filter for Payments </label>
            <select type="select" class="form-select form-select-sm" name="payment_type" id="payment_type">
                <option value=""></option>
            </select>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <button class="btn btn-success btn-sm "><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-6">
            <label for="">Make Payment</label>
            <a href="" class="btn btn-success btn-sm"><i class="ti ti-plus"></i></a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <label for="">Total Money Collected for all fees</label>
            <input type="text" disabled="" value="" class="form-control form-control-sm" >
        </div>

    </div>
</form> --}}


<div class="table-responsive text-nowrap p-3">
    <table class="table" id="">
      <thead>
        <tr>
          <th>SN</th>
          <th>Name</th>
          <th>Payment Type</th>
          <th>Amount</th>
          <th>Paid</th>
          <th>Balance</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          @php $sn=0; @endphp

        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          {{-- <td><span class="badge {{ $payment->payment_status == 'Paid' ? 'bg-label-success' : 'bg-label-danger'  }}  me-1">{{ $payment->payment_status }}</span></td> --}}
          <td>
              <div class="btn-group">
                <a href="javascript:void(0)" class="btn btn-info btn-xs"><i class="ti ti-eye"></i></a>
              </div>
          </td>
        </tr>

      </tbody>
    </table>
</div>


@endsection
{{-- @section('second-card')
<div class="card">
    <div class="card-header ">

</div>
@endsection --}}

