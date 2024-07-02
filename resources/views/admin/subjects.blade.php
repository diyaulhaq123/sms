@extends('layouts.view')
@section('page-title')
School Subjects
@endsection
@section('card-header')
Subjects

<button class="btn btn-info btn-sm" style="float: right" data-bs-target="#subjectModal" data-bs-toggle="modal"><i class="ti ti-plus"></i></button>
@endsection
@section('body')

@if ($subject)
<form action="{{ route('edit.subject') }}" method="post">
    @csrf
    @method('patch')
    <div class="row align-items-end ">
        <div class="col-lg-4 col-xl-4 col-12">
            <label for="">Name</label>
            <input type="text" class="form-control form-control-sm" name="name" value="{{ $subject->name }}" id="name">
            <input type="hidden" name="id" value="{{ $subject->id }}">
        </div>
        <div class="col-2 align-items-end btn-group">
            <button class="btn btn-success btn-sm ">Save</button>
            <a href="{{ route('subjects') }}" class="btn btn-primary btn-sm">Back</a>
        </div>
    </div>
</form>

@else
<div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>SN</th>
          <th>Name</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          @php $sn=0; @endphp
          @foreach ($subjects as $row)
        <tr>
          <td>{{ ++$sn }}</td>
          <td>{{ $row->name }}</td>
          <td>
              {!! $row->status == 1 ? '<span class="badge bg-label-success me-1">Active</span>' : '<span class="badge bg-label-danger me-1">In-active</span>' !!}
          </td>
          <td>
              <div class="btn-group">
                <form action="{{ route('delete.subject') }}" method="post">
                    @csrf
                    @method('delete')
                  <button class="btn btn-danger btn-xs delete" type="button"><i class="ti ti-trash"></i></button>
                  <input type="hidden" value="{{ $row->id }}" name="id">
                </form>
                  <a href="{{ route('find.subject', $row->id) }}" class="btn btn-info btn-xs"><i class="ti ti-edit"></i></a>
              </div>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
</div>

@endif

{{-- <form action="#" method="post">
    @csrf
    <div class="row align-items-end">
            @csrf
            <div class="col-lg-6 col-sm-12">
                <label for=""> Name</label>
                <input type="text" class="form-control" name="name" placeholder="Role Name">
                @error('name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-3 col-sm-6">
                <button class="btn btn-success">Submit</button>
            </div>
    </div>

</form> --}}

<div class="modal fade" id="subjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content  p-md-5" >
        <div class="modal-body modalBody" id="modalBody">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
                <h3 class="mb-2">Register new Subject</h3>
            </div>
            <form action="{{ route('add.subject') }}" method="post">
                @csrf
                <div class="row align-items-end justify-content-center">
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name">
                    </div>
                    <div class="col-4 align-items-end">
                        <button class="btn btn-success btn-sm ">Save</button>
                    </div>
                </div>

            </form>
        </div>
      </div>
    </div>
</div>
@endsection
