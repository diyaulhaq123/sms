@extends('layouts.view')
@section('page-title')
Students
@endsection

@can('search_students')
    @section('card-header')
    Student List
    @endsection
    @section('body')
    <form action="{{ route('student.filter') }}" method="post">
        @csrf
        <div class="row align-items-end">

                @csrf
                <div class="col-lg-4 col-sm-12">
                    <label for=""> Class</label>
                    <select type="text" class="form-control select2" name="class_id">
                        <option value="">- Select -</option>
                        @foreach ($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                    @error('class')
                    <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-4 col-sm-12">
                    <label for=""> Wing</label>
                    <select type="text" class="form-control" name="wing" id="wing">
                        <option value="">- Select -</option>
                        @foreach ($wings as $wing)
                        <option value="{{$wing->name}}">{{$wing->name}}</option>
                        @endforeach
                    </select>
                    @error('wing')
                    <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-lg-2 col-sm-6">
                    <button class="btn btn-success">filter</button>
                </div>
        </div>

    </form>
    @endsection
@endcan
@section('second-card')

<div class="card">
    <h5 class="card-header">Class Name</h5>
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
            @if($students)
            @foreach ($students as $student)
            <tr>
                <td></td>
                <td>{{ ++$sn }}</td>
                <td>{{ $student->last_name.' '. $student->first_name}}</td>
                <td>{{ $student->admission_no }}</td>
                <td><span class="badge bg-label-success me-1">Active</span></td>
                <td>
                    <div class="btn-group">
                        <form action="#" method="post">
                            @csrf
                            <input type="hidden" value="" name="" id="">
                        <div class="btn-group">
                            @can('edit_student')
                            <button class="btn btn-info btn-xs"><i class="ti ti-edit"></i></button>
                            @endcan
                            @can('delete_student')
                            <button class="btn btn-danger btn-xs delete" type="button" ><i class="ti ti-trash"></i></button>
                            @endcan
                            @can('print_idcard')
                            <a href="{{route('show.id.card', $student->id )}}" class="btn btn-primary btn-xs"><i class="ti ti-printer"></i></a>
                            @endcan
                        </div>
                        </form>
                    </div>
                </td>
              </tr>
              @endforeach
            @else
            @foreach ($students as $row)
            <tr>
                <td></td>
                <td>{{ ++$sn }}</td>
                <td>{{ $row->last_name.' '. $row->first_name}}</td>
                <td>{{ $row->admission_no }}</td>
                <td><span class="badge bg-label-success me-1">Active</span></td>
                <td>
                    <div class="btn-group">
                        <form action="#" method="post">
                            @csrf
                            <input type="hidden" value="" name="" id="">
                        <div class="btn-group">
                            @can('edit_student')
                            <button class="btn btn-info btn-xs"><i class="ti ti-edit"></i></button>
                            @endcan
                            @can('delete_student')
                            <button class="btn btn-danger btn-xs delete" type="button"><i class="ti ti-trash"></i></button>
                            @endcan
                            @can('print_idcard')
                            <a href="{{route('show.id.card', $row->id )}}" class="btn btn-primary btn-xs"><i class="ti ti-printer"></i></a>
                            @endcan
                        </div>
                        </form>
                    </div>
                </td>
              </tr>
            @endforeach
          @endif

        </tbody>
      </table>
    </div>
</div>

@endsection
