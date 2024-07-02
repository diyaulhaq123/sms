@extends('layouts.view')
@section('page-title')
Allocations - Class
@endsection
@section('card-header')
Allocate Classes
@endsection
@section('body')
@if($allocated == '')
<form action="{{ route('add.class.allocation') }}" method="post">
    @method('post')
    @csrf
    <div class="row align-items-end">
            <div class="col-lg-3 col-sm-12 mt-2">
                <label for="">Staff</label>
                <select class="form-select form-select-sm" name="staff_id">
                    <option value="">- Select -</option>
                    @foreach ($staffs as $staff)
                    <option value="{{ $staff->id }}">{{ $staff->name }} - {{ $staff->staff ? $staff->staff->staff_id : '' }}</option>
                    @endforeach
                </select>
                @error('staff_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-sm-12 mt-2">
                <label for="">Class</label>
                <select class="form-select form-select-sm" name="class_id">
                    <option value="">- Select -</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-sm-12 mt-2">
                <label for="">Wing</label>
                <select class="form-select form-select-sm" name="wing">
                    <option value="">- Select -</option>
                    @foreach ($wings as $wing)
                    <option value="{{ $wing->name }}" >{{ $wing->name }}</option>
                    @endforeach
                </select>
                @error('wing')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-sm-12 mt-2">
                <label for="">Session</label>
                <select type="text" class="form-select form-select-sm" name="session_id">
                    <option value="">- Select -</option>
                    @foreach ($sessions as $session)
                    <option value="{{ $session->id }}">{{ $session->name }}</option>
                    @endforeach
                </select>
                @error('session_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <button class="btn btn-success btn-sm">Allocate</button>
            </div>
    </div>

</form>
@else

<form action="{{ route('edit.class.allocation') }}" method="post">
    @method('patch')
    @csrf
    <div class="row align-items-end">
            <input type="hidden" value="{{ $allocated->id }}" name="id">
            <div class="col-lg-3 col-sm-12 mt-2">
                <label for="">Staff</label>
                <select class="form-select form-select-sm" name="staff_id">
                    <option value="">- Select -</option>
                    @foreach ($staffs as $staff)
                    <option value="{{ $staff->id }}" {{ $allocated->staff_id == $staff->id ? 'selected' : '' }} >{{ $staff->name }} - {{ $staff->staff ? $staff->staff->staff_id : '' }}</option>
                    @endforeach
                </select>
                @error('staff_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-sm-12 mt-2">
                <label for="">Class</label>
                <select class="form-select form-select-sm" name="class_id">
                    <option value="">- Select -</option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ $allocated->class_id == $class->id ? 'selected' : '' }} >{{ $class->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-12 mt-2">
                <label for="">Wing</label>
                <select class="form-select form-select-sm" name="wing">
                    <option value="">- Select -</option>
                    @foreach ($wings as $wing)
                    <option value="{{ $wing->name }}" {{ $allocated->wing == $wing->name ? 'selected' : '' }} >{{ $wing->name }}</option>
                    @endforeach
                </select>
                @error('wing')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-12 mt-2">
                <label for="">Session</label>
                <select type="text" class="form-select form-select-sm" name="session_id">
                    <option value="">- Select -</option>
                    @foreach ($sessions as $session)
                    <option value="{{ $session->id }}" {{ $allocated->session_id == $session->id ? 'selected' : '' }} >{{ $session->name }}</option>
                    @endforeach
                </select>
                @error('session_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-6 mt-2">
                <button class="btn btn-success btn-sm">Update Allocation</button>
            </div>
    </div>

</form>

@endif

@endsection
@section('second-card')

<div class="card">
    <h5 class="card-header">Allocations</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th>SN</th>
            <th>Staff Name</th>
            <th>Staff ID</th>
            <th>Class</th>
            <th>Wing</th>
            <th>Session</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @foreach ($allocations as $allocation)
          <tr>
            <td>{{ ++$sn }}</td>
            <td>{{ $allocation->staff ? $allocation->staff->last_name.' '. $allocation->staff->first_name : '' }}</td>
            <td>{{ $allocation->staff ? $allocation->staff->staff_id : '' }}</td>
            <td>{{ $allocation->class->name  ?? '' }}</td>
            <td>{{ $allocation->wing ?? '' }}</td>
            <td>{{ $allocation->session->name ?? '' }}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-info btn-xs" href="{{route('find.class.allocation', $allocation->id)}}" id=""><i class="ti ti-edit"></i></a>
                    <form action="{{route('delete.class.allocation')}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="id" value="{{ $allocation->id ?? ''  }}">
                        <button class="btn btn-danger btn-xs delete" type="button"><i class="ti ti-trash"></i></button>
                    </form>
                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
