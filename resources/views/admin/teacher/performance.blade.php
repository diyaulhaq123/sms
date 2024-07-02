@use('App\Repositories\Staff\Teacher\TeacherRepository')
@php
    $teach = new TeacherRepository
@endphp
@extends('layouts.view')
@section('page-title')
Performance
@endsection
@section('card-header')
Add Performance
@endsection
@section('body')

@if (!$allocation)
<div class="alert alert-danger text-center">You do no have access to this resource</div>
@else

<div class="row">
    <div class="table-responsive text-nowrap p-3">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th></th>
              <th>SN</th>
              <th>Name</th>
              <th>Reg No</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
              @php $sn=0; @endphp
              @foreach ($students as $student)
              <tr>
                  <td></td>
                  <td>{{ ++$sn }}</td>
                  <td>{{ $student->last_name.' '. $student->first_name}}</td>
                  <td>{{ $student->admission_no }}</td>
                  <td><span class="badge bg-label-success me-1">Active</span></td>
                  <td>
                      <div class="btn-group">
                          <div class="btn-group">
                              @can('add_performance')
                              <button class="btn btn-primary btn-xs add"
                                data-bs-toggle="modal"
                                data-bs-target="#performanceModal" data-id="{{ $student->id }}" ><i class="ti ti-upload"></i></button>
                              @endcan
                              @can('edit_performance')
                              @php  $performance = $teach->confirmStudentsPerformance($class_id,$student->id,$wing)  @endphp
                              @if ($performance)
                                <button class="btn btn-success btn-xs edit_performance" data-bs-toggle="modal" data-bs-target="#editPerformanceModal" data-id="{{ $performance->id }}"> <i class="ti ti-circle"></i> </button>
                                <input type="hidden" id="student_id" value="{{ $performance->student_id }}">
                                <input type="hidden" id="id" value="{{ $performance->id }}">
                                <input type="hidden" id="term_id" value="{{ $performance->term_id }}">
                                <input type="hidden" id="session_id" value="{{ $performance->session_id }}">
                                <input type="hidden" id="class_id" value="{{ $performance->class_id }}">
                                <input type="hidden" id="wing" value="{{ $performance->wing }}">
                              @endif
                              @endcan
                          </div>
                      </div>
                  </td>
                </tr>
                @endforeach

          </tbody>
        </table>
    </div>
</div>

@endif

<!-- Modal template for Add performance -->
<div class="modal modal-transparent fade" id="performanceModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <a
          href="javascript:void(0);"
          class="btn-close text-white"
          data-bs-dismiss="modal"
          aria-label="Close"></a>

        <p class="text-white text-large fw-light mb-3">Add students performace for the term</p>
        <form action="{{ route('create.performance') }}" method="post">
          @csrf
            <div class="row justify-content-between text-dark" id="student">
            </div>
            <input type="hidden" name="session_id" value="{{ $session->id }}">
            <input type="hidden" name="term_id" value="{{ $term->id }}">
            <input type="hidden" name="class_id" value="{{ $class_id }}">
            <input type="hidden" name="wing" value="{{ $wing }}">
            <input type="hidden" name="staff_id" value="{{ auth()->user()->id }}">
              <div class="row">
                <div class="col-lg-4">
                  <label for="" class="text-white">Puntuality</label>
                  <input type="number" class="form-control" max="10" name="punctuality" value="{{ old('punctuality') }}" >
                </div>
                <div class="col-lg-4">
                  <label for="" class="text-white">Neatness</label>
                  <input type="number" class="form-control" max="10" name="neatness" value="{{ old('neatness') }}" >
                </div>
                <div class="col-lg-4">
                  <label for="" class="text-white">Confidence</label>
                  <input type="number" class="form-control" max="10" name="confidence" value="{{ old('confidence') }}">
                </div>
                <div class="col-lg-4">
                  <label for="" class="text-white">Attendance</label>
                  <input type="number" class="form-control" max="10" name="attendance" value="{{ old('attendance') }}">
                </div>
                <div class="col-lg-4">
                  <label for="" class="text-white">Remark</label>
                  <textarea type="text" class="form-control" rows="3" name="remark" ></textarea>
                </div>
                <div class="col-lg-4 d-flex align-items-end">
                    <button class="btn btn-success" id="">Save</button>
                </div>
              </div>

          </div>
        </form>
        {{-- <div class="text-start text-white opacity-50">We won't share your email address</div> --}}
      </div>
    </div>
  </div>
</div>
<!-- End Modal template for Add performance -->



<!-- Modal template for Edit performance -->
<div class="modal modal-transparent fade" id="editPerformanceModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <a
            href="javascript:void(0);"
            class="btn-close text-white"
            data-bs-dismiss="modal"
            aria-label="Close"></a>
            <form action="{{ route('update.performance') }}" method="post">
                @csrf
                @method('patch')
                <div class="row justify-content-between text-dark" id="student_update">
                </div>
            </form>
          <p class="text-white text-large fw-light mb-3">Edit students performace for the term</p>

        </div>
      </div>
    </div>
</div>
<!-- End Modal template for Edit performance -->


@endsection


