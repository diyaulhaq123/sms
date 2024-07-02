@use('App\Repositories\Staff\Teacher\TeacherRepository', 'TeacherRepository')
@php
    $teach = new TeacherRepository;
@endphp
@extends('layouts.view')
@section('page-title')
Grading
@endsection
@section('card-header')
Grade students
@endsection

@section('body')

@if (!$allocations)
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
                              @can('add_grade')
                              <button class="btn btn-primary btn-xs add"
                                data-bs-toggle="modal"
                                data-bs-target="#smallModal" data-id="{{ $student->id }}" ><i class="ti ti-plus"></i></button>
                              @endcan
                              @php  $grade = $teach->confirmStudentsGrade($class_id,$student->id)  @endphp
                              @if ($grade)
                                <button class="btn btn-success btn-xs update" data-bs-toggle="modal" data-bs-target="#smallModal2" data-id="{{ $grade->id }}"> <i class="ti ti-edit"></i> </button>
                              @endif
                          </div>
                      </div>
                  </td>
                </tr>
                @endforeach

          </tbody>
        </table>
    </div>
</div>

<!-- Grade Modal for insert 1 -->
<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel2">Grade</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('create.grade') }}" method="post">
            @csrf
                <div class="row">
                    <div class="" id="student"></div>
                    <input type="hidden" name="subject_id" id="subject_id" value="{{ $subject_id }}">
                    <input type="hidden" name="class_id" id="class_id" value="{{ $class_id }}">
                    <input type="hidden" name="staff_id" id="staff_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="session_id" value="{{ $session->id }}">
                    <input type="hidden" name="term_id" value="{{ $term->id }}">
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="ca1" class="form-label">CA 1</label>
                            <input type="number" id="ca1" name="ca1" class="form-control" max="20" placeholder="CA 1" />
                        </div>
                        <div class="col mb-0">
                            <label for="ca3" class="form-label">CA 2</label>
                            <input type="number" id="ca2" name="ca2" class="form-control" max="20" placeholder="CA 2" />
                        </div>
                    </div>
                <div class="row g-2">
                    <div class="col mb-0">
                        <label for="ca2" class="form-label">CA 3</label>
                        <input type="number" id="ca2" name="ca3" class="form-control" max="20" placeholder="CA 3" />
                    </div>
                    <div class="col mb-0">
                        <label for="exams" class="form-label">Exams</label>
                        <input type="number" id="exam" name="exam" class="form-control" placeholder="Exams" />
                    </div>
                </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save Grade</button>
            </div>
          </form>
        </div>
    </div>
    </div>
</div>

<!-- Grade Modal update/edit 2 -->
<div class="modal fade" id="smallModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel22">Update Grade</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <form action="{{ route('update.grade') }}" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="" id="student_update"></div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Update Grade</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>



@endif

@endsection
