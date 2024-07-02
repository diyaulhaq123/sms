@extends('layouts.view')
@section('page-title')
Payments
@endsection
@section('card-header')
Payment List
@endsection
@section('body')

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-6 col-sm-6">Search/Filter for Payments</div>
    <div class="col-2"></div>
    <div class="col-lg-4 col-md-3 col-sm-3">
        <label for="">Collections (Current Session and term)</label>
        <input type="text" disabled="" value="{{ $collection }}" class="form-control form-control-sm" >
    </div>
</div>

<form action="{{ route('get.payments') }}" method="post">
    @csrf
    <div class="row d-flex align-items-end my-3">
        <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
            <label for="">Payment Type</label>
            <select type="select" class="form-select form-select-sm" name="payment_type" id="payment_type">
                <option value="">Select</option>
                @foreach ($pay_types as $pay)
                <option value="{{ $pay->id }}">{{ $pay->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
            <label for="">Session</label>
            <select type="select" class="form-select form-select-sm" name="session_id" id="session_id">
                <option value="">Select</option>
                @foreach ($sessions as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
            <label for="">Term </label>
            <select type="select" class="form-select form-select-sm" name="term_id" id="term_id">
                <option value="">Select Fee Type</option>
                @foreach ($terms as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 mb-2">
            <label for="">Class </label>
            <select type="select" class="form-select form-select-sm" name="class_id" id="class_id">
                <option value="">Select Fee Type</option>
                @foreach ($classes as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <button class="btn btn-success btn-sm "><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>

    </div>
</form>


@endsection
@section('second-card')
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col-lg-6 col-md-4 col-sm-12">
                <h6>Note: This is only tuition fee for current session and term</h6>
            </div>
            <div class="col-lg-4 col-md-4" style="float:right">
                <button class="btn btn-info" style="float:right" id="btnExport">Download List</button>
            </div>
        </div>
    </div>

    <div class="table-responsive text-nowrap p-3">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th>SN</th>
              <th>Student Reg</th>
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
              @foreach ($payments as $payment)
            <tr>
              <td>{{ ++$sn }}</td>
              <td>{{ $payment->student->admission_no ?? '-'}}</td>
              <td>{{ $payment->payment_type->name ?? '-' }}</td>
              <td>{{ number_format($payment->amount, 2)  ?? '0.00' }}</td>
              <td>{{ number_format($payment->paid, 2) ?? '0.00' }}</td>
              <td>{{ number_format($payment->balance, 2) ?? '0.00' }}</td>
              <td><span class="badge {{ $payment->payment_status == 'Paid' ? 'bg-label-success' : 'bg-label-danger'  }}  me-1">{{ $payment->payment_status }}</span></td>
              <td>
                  <div class="btn-group">
                    <a href="{{route('update.payment')}}" class="btn btn-info btn-xs"><i class="ti ti-edit"></i></a>
                    <button class="btn btn-info btn-xs"><i class="ti ti-eye"></i></button>
                    @can('delete-payment')
                    <button class="btn btn-danger btn-xs delete" type="button"><i class="ti ti-trash"></i></button>
                    @endcan
                  </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/gh/linways/table-to-excel@v1.0.4/dist/tableToExcel.js"></script>
<script>
    $(document).ready(function () {
        $("#btnExport").click(function () {
            // Get the table element by ID
            let table = document.getElementById("myTable");
            console.log(table);
            debugger;

            // Convert the table to Excel format
            TableToExcel.convert(table, {
                name: `payments.xlsx`,
                sheet: {
                    name: 'payments'
                }
            });
        });
    });
</script>
@endsection
