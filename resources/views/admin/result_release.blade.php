@extends('layouts.view')
@section('page-title')
Result Matters
@endsection
@section('card-header')
Release Result
@endsection
@section('body')

{{-- <form action="{{ route('send.test.mail') }}" method="post">
    @method('post')
    @csrf
    <div class="row align-items-end m-5">
        <div class="col-4">
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
            </div>
        </div>
        <div class="col-4">
            <button class="btn btn-primary">Send Email</button>
        </div>
    </div>
</form> --}}

<form action="{{ route('add.result') }}" method="post">
    @csrf
    <div class="row align-items-end">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="">Class</label>
                <select name="class_id" id="class_id" class="form-control form-select-sm">
                <option value="">- Select Class -</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}"> {{ $class->name }} </option>
                @endforeach
                </select>
            </div>
            @error('class_id')
            <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
            @enderror
        </div>


        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="">Term</label>
                <select name="term_id" id="term_id" class="form-control form-select-sm">
                <option value="">- Select -</option>
                @foreach ($terms as $term)
                <option value="{{ $term->id }}"> {{ $term->name }} </option>
                @endforeach
                </select>
            </div>
            @error('term_id')
            <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="form-group">
                <label for="">Session</label>
                <select name="session_id" id="session_id" class="form-control form-select-sm">
                <option value="">- Select -</option>
                @foreach ($sessions as $session)
                <option value="{{ $session->id }}"> {{ $session->name }} </option>
                @endforeach
                </select>
            </div>
            @error('session_id')
            <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
            @enderror
        </div>
        <div class="col-3">
            <button class="btn btn-primary btn-sm">Release</button>
        </div>
    </div>

</form>
@endsection
@section('second-card')

<div class="card">
    <h5 class="card-header">Released Result list</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th>SN</th>
            <th>Class</th>
            <th>Session</th>
            <th>Term</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @foreach ($results as $result)
          <tr>
            <td>{{ ++$sn }}</td>
            <td>{{ $result->class->name }}</td>
            <td>{{ $result->session->name }}</td>
            <td>{{ $result->term->name }}</td>
            <td>
                <form action="{{route('toggle.result')}}" method="post">
                    @method('patch')
                    @csrf
                    <input type="hidden" value="{{ $result->id }}" name="id">
                {!! $result->status == 1 ? '<button class="btn btn-success btn-xs">Active</button>' : '<button class="btn btn-danger btn-xs">In-active</button>' !!}
                </form>
            </td>
            <td>
                <form action="{{ route('delete.result') }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" value="{{ $result->id }}" name="id">
                <button class="btn btn-danger btn-xs delete" type="button"><i class="ti ti-trash"></i></button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
