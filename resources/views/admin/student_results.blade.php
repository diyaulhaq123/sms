@extends('layouts.view')
@section('page-title')
Student Results
@endsection
@section('card-header')
View Student Results
@endsection
@section('body')
<form action="{{ route('student.result.student') }}" method="get">
    @csrf
    @method('get')
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-4 col-sm-12">
                <label for="">Class</label>
                <select type="text" class="form-control select2" name="class_id" >
                    <option value="">- Select -</option>
                    @foreach ($classes as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 col-sm-12">
                <label for="">Wing</label>
                <select type="text" class="form-control select2" name="wing" >
                    <option value="">- Select -</option>
                    @foreach ($wings as $row)
                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-sm-6">
                <button class="btn btn-success">Filter</button>
            </div>
    </div>

</form>
@endsection
@if($students)
@section('second-card')

<div class="card">
    <h5 class="card-header">{{ $class->name  }}</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Session</th>
            <th>Term</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @forelse ($students as $row)

          <tr>
            <form action="{{ route('view.result') }}" method="get">
                @csrf
                @method('get')
                <input type="hidden" value="{{ $row->id ?? '' }}" name="student_id">
                <input type="hidden" value="{{ $class->id ?? '' }}" name="class_id">
                <td>{{ ++$sn }}</td>
                <td>{{  $row->last_name.' '.  $row->first_name }}</td>
                <td>
                    <select name="session_id" id="" class="form-select form-select-sm">
                        <option value="">- Select -</option>
                        @foreach ($sessions as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="term_id" id="" class="form-select form-select-sm">
                        <option value="">- Select -</option>
                        @foreach ($terms as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-success btn-sm"><i class="ti ti-eye"></i></button>
                    </div>
                </td>
            </form>
            @empty
            <td colspan="5" ><div class="alert alert-warning text-center p-1">No Students Record Found</div></td>
          </tr>

          @endforelse

        </tbody>
      </table>
    </div>
</div>

@endsection
@endif
