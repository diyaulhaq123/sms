@extends('layouts.view')
@section('page-title')
Allocations
@endsection
@section('card-header')
Allocate Subject
@endsection
@section('body')
@if($allocated == '')
<form action="{{ route('add.subject.allocation') }}" method="post">
    @method('post')
    @csrf
    <div class="row align-items-end">
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Staff</label>
                <select class="form-select form-select-sm" name="staff_id">
                    <option value="">- Select -</option>
                    @foreach ($staffs as $row)
                    <option value="{{ $row->id }}">{{ $row->name }} - {{ $row->email }}</option>
                    @endforeach
                </select>
                @error('staff_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Class</label>
                <select class="form-select form-select-sm" name="class_id">
                    <option value="">- Select -</option>
                    @foreach ($classes as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Subject</label>
                <select type="text" class="form-select form-select-sm" name="subject_id">
                    <option value="">- Select -</option>
                    @foreach ($subjects as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('subject_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Session</label>
                <select type="text" class="form-select form-select-sm" name="session_id">
                    <option value="">- Select -</option>
                    @foreach ($sessions as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('session_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Term</label>
                <select type="text" class="form-select form-select-sm" name="term_id">
                    <option value="">- Select -</option>
                    @foreach ($terms as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('term_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-6">
                <button class="btn btn-success btn-sm">Allocate</button>
            </div>
    </div>

</form>
@else

<form action="{{ route('edit.subject.allocation') }}" method="post">
    @method('patch')
    @csrf
    <div class="row align-items-end">
            <input type="hidden" value="{{ $allocated->id }}" name="id">
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Staff</label>
                <select class="form-select form-select-sm" name="staff_id">
                    <option value="">- Select -</option>
                    @foreach ($staffs as $row)
                    <option value="{{ $row->id }}" {{ $allocated->staff_id == $row->id ? 'selected' : '' }} >{{ $row->name }} - {{ $row->email}}</option>
                    @endforeach
                </select>
                @error('staff_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Class</label>
                <select class="form-select form-select-sm" name="class_id">
                    <option value="">- Select -</option>
                    @foreach ($classes as $row)
                    <option value="{{ $row->id }}" {{ $allocated->class_id == $row->id ? 'selected' : '' }} >{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Subject</label>
                <select type="text" class="form-select form-select-sm" name="subject_id">
                    <option value="">- Select -</option>
                    @foreach ($subjects as $row)
                    <option value="{{ $row->id }}" {{ $allocated->subject_id == $row->id ? 'selected' : '' }} >{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('subject_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Session</label>
                <select type="text" class="form-select form-select-sm" name="session_id">
                    <option value="">- Select -</option>
                    @foreach ($sessions as $row)
                    <option value="{{ $row->id }}" {{ $allocated->session_id == $row->id ? 'selected' : '' }} >{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('session_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12 mt-2">
                <label for="">Term</label>
                <select type="text" class="form-select form-select-sm" name="term_id">
                    <option value="">- Select -</option>
                    @foreach ($terms as $row)
                    <option value="{{ $row->id }}" {{ $allocated->term_id == $row->id ? 'selected' : '' }} >{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('term_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-6">
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
            <th>Staff email</th>
            <th>Class</th>
            <th>Subject</th>
            <th>Session</th>
            <th>Term</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @foreach ($allocations as $row)
          <tr>
            <td>{{ ++$sn }}</td>
            <td>{{ $row->user->name ?? 'NA' }}</td>
            <td>{{ $row->user->email ?? 'NA' }}</td>
            <td>{{ $row->class->name  }}</td>
            <td>{{ $row->subject->name }}</td>
            <td>{{ $row->session->name }}</td>
            <td>{{ $row->term->name }}</td>
            <td>
                <div class="btn-group">
                    <a class="btn btn-info btn-xs" href="{{route('find.subject.allocation', $row->id)}}" id=""><i class="ti ti-edit"></i></a>
                    <form action="{{ route('delete.subject.allocation') }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="id" value="{{ $row->id }}">
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
