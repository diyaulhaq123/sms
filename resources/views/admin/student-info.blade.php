@extends('layouts.view')
@section('page-title')
Students
@endsection
@section('card-header')
Student Information
@endsection
@section('body')
<form action="{{ route('get.student.info') }}" method="post">
    @csrf
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-3 col-xl-3 col-sm-12">
                <label for=""> Class</label>
                <select class="form-select select2" name="class_id" id="class_id" >
                    <option value="">- Select - </option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-xl-3 col-sm-12">
                <label for=""> Wing</label>
                <select class="form-select" name="wing" id="wing" >
                    <option value="">- Select - </option>
                    @foreach ($wings as $wing)
                    <option value="{{ $wing->name }}">{{ $wing->name }}</option>
                    @endforeach
                </select>
                @error('wing')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
        <div class="col-lg-1 col-sm-2">
            <button class="btn btn-info btn-sm"><i class="ti ti-search"></i></button>
        </div>
            <div class="col-lg-3 col-xl-3 col-sm-12">
                <label for=""> Registration Number Or </label>
                <input type="text" class="form-control" name="reg_no" id="reg_no" placeholder="Registration Number">
                @error('reg_no')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
        <div class="col-lg-1 col-sm-2">
            <button class="btn btn-info btn-sm"><i class="ti ti-search"></i></button>
        </div>

    </div>

</form>
@endsection
@section('second-card')

<div class="card">
    <h5 class="card-header">Students</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th></th>
            <th>SN</th>
            <th>Name</th>
            <th>Registration number</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @forelse ($students as $student)
          <tr>
            <td></td>
            <td>{{ ++$sn }}</td>
            <td>{{ $student->last_name.' '. $student->first_name}}</td>
            <td>{{ $student->admission_no}}</td>

            <td><span class="badge bg-label-success me-1">Active</span></td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-info btn-sm" href="{{ route('view.student',$student->id) }}"><i class="ti ti-eye"></i></a>
                    <a class="btn btn-primary btn-sm" href="javascript:void(0)"><i class="ti ti-edit"></i></a>
                </div>
            </td>
          </tr>
          @empty
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><span class="badge bg-label-success me-1">Active</span></td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-info btn-sm"><i class="ti ti-eye"></i></button>
                    <button class="btn btn-primary btn-sm"><i class="ti ti-edit"></i></button>
                </div>
            </td>
          </tr>
          @endforelse

        </tbody>
      </table>
    </div>
</div>

@endsection
