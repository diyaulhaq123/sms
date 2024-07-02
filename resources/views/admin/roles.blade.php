@extends('layouts.view')
@section('page-title')
    Roles
@endsection

@section('card-header')
    Roles
@endsection
@section('body')

@if ($role)

<form action="{{ route('update.role') }}" method="post">
    @csrf
    @method('patch')
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-6 col-sm-12">
                <label for="">Role Name</label>
                <input type="hidden" name="id" value="{{ $role->id }}">
                <input type="text" class="form-control" name="name" placeholder="Role Name" value="{{ $role->name }}">
                @error('name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-3 col-sm-6">
                <button class="btn btn-success">Update</button>
            </div>
    </div>

</form>

@else

<form action="{{ route('add.role') }}" method="post">
    @csrf
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-6 col-sm-12">
                <label for="">Role Name</label>
                <input type="text" class="form-control" name="name" placeholder="Role Name">
                @error('name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-3 col-sm-6">
                <button class="btn btn-success">Create</button>
            </div>
    </div>

</form>
@endif

@endsection
@section('second-card')

<div class="card">
    <h5 class="card-header">List Of Roles</h5>
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
            @foreach ($roles as $role)
          <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td><span class="badge bg-label-success me-1">Active</span></td>
            <td>
                <div class="btn-group">
                    <form action="{{ route('delete.role') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="role" value="{{ $role->id }}">
                    <button class="btn btn-danger btn-sm delete" type="button"><i class="ti ti-trash"></i></button>
                    </form>
                    <a href="{{ route('find.role', $role->id) }}" class="btn btn-info btn-sm"><i class="ti ti-edit"></i></a>
                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
