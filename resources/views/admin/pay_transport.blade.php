use ;
@php
$academics = app(App\Repositories\Academics\AcademicsRepository::class);
@endphp
@extends('layouts.view')
@section('page-title')
Pay Transportation Fee
@endsection
@section('card-header')
Transportation Fee
@endsection
@section('body')
<form action="{{ route('pay.transport.find') }}" method="post">
    @csrf
    @method('post')
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-6 col-sm-12">
                <label for="">Student Admission No</label>
                <input type="text" name="admission_no" id="admission_no" class="form-control" placeholder="Admission Number">
                @error('admission_no')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-3 col-sm-6">
                <button class="btn btn-success">Query</button>
            </div>
    </div>

</form>
@endsection

@if ($student)
    
@section('second-card')

{{-- <div class="card"> --}}
    <div class="row justify-content-center my-2">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                @if ($academics->checkPaymentStatus(3, $student->id, $session->id, $term->id))
                <div class="alert alert-success mt-2 mx-2 text-center">Payment for this session and term exists</div>
                @endif

              <div class="card-body text-center">
                <div class="mx-auto my-3">
                  <img src="{{ asset('dashboard/img/dummy.jpeg') }}" alt="Avatar Image" class="rounded-circle w-px-100">
                </div>
                <h4 class="mb-1 card-title text-uppercase">{{ $student->last_name. ' '. $student->first_name }}</h4>
                <span class="pb-1">{{ $student->class->name }}</span>
                <form action="{{ route('create.student.transport') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
                    <input type="hidden" name="payment_type_id" value="{{ $payType->id }}">
                    <input type="hidden" name="session_id" id="session_id" value="{{ $session->id }}">
                    <input type="hidden" name="guardian_id" id="guardian_id" value="{{ $student->guardian_id }}">
                    <input type="hidden" name="class_id" id="class_id" value="{{ $student->class_id }}">
                    <input type="hidden" name="term_id" value="{{ $term->id }}">
                    <input type="hidden" name="ref_no" value="{{'REF'.mt_rand(1000000000, 9999999999) }}" >
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-12 ">
                            <select name="route_id" id="route_id" class="form-select form-select-sm select2">
                                <option value="">- Select -</option>
                                @foreach ($routes as $row)
                                    <option value="{{ $row->id }}"> {{ $row->name }} ({{ number_format($row->amount, 2) }}) </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-center my-3 gap-2">
                    <button type="submit" class="btn btn-success  btn-xs me-1">Pay Offline</button>
                    <a href="#"><span class="badge bg-label-info">Pay Online</span></a>
                    </div>
                </form>
                <div class="d-flex align-items-center justify-content-center">
                  {!! $student->status == 1 ? '<a href="javascript:;" class="btn btn-primary btn-sm d-flex align-items-center me-3 waves-effect waves-light"><i class="ti-xs me-1 ti ti-user-check me-1"></i>Active</a>'
                  : '<a href="javascript:;" class="btn btn-danger btn-sm d-flex align-items-center me-3 waves-effect waves-light"><i class="ti-xs me-1 ti ti-user-x me-1"></i>In-Active</a>'
                    !!}
                </div>
              </div>
            </div>
        </div>
    </div>

    {{-- <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Class</th>
            <th>Session</th>
            <th>Term</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
          <tr>
            <form action="#" method="post">
                @csrf
            <td>1</td>
            <td>Full name</td>
            <td>
                Class Name
                <input type="hidden" name="class_id" value="">
            </td>
            <td>
                <select name="session_id" id="" class="form-select form-select-sm">
                    <option value="">- Select -</option>
                </select>
            </td>
            <td>
                <select name="term_id" id="" class="form-select form-select-sm">
                    <option value="">- Select -</option>
                </select>
            </td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-success btn-sm"><i class="ti ti-eye"></i></button>
                </div>
            </td>
            </form>
          </tr>

        </tbody>
      </table>
    </div> --}}

{{-- </div> --}}

@endsection

@else

@section('second-card')
    <div class="row justify-content-center">
        <div class="col-6 col-sm-12 text-center">
            <div class="alert alert-danger">
                Student with this registration number does not exist
            </div>
        </div>
    </div>
@endsection

@endif
