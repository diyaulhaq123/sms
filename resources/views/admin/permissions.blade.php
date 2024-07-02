@extends('layouts.view')
@section('page-title')
    Permissions
@endsection
@section('card-header')
    Permissions
@endsection
@section('body')

@if ($permission)

<form action="{{ route('update.permission') }}" method="post">
    @csrf
    @method('patch')
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-6 col-sm-12">
                <label for="">Permission Name</label>
                <input type="hidden" value="{{ $permission->id }}" name="id">
                <input type="text" class="form-control" name="name" placeholder="Permission Name" value="{{ $permission->name }}">
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

<form action="{{ route('add.permission') }}" method="post">
    @csrf
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-6 col-sm-12">
                <label for="">Permission Name</label>
                <input type="text" class="form-control" name="name" placeholder="Permission Name">
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
    <h5 class="card-header">List Of Permissions</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @foreach ($permissions as $permission)
          <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>
                <div class="btn-group">
                    <form action="{{ route('delete.permission') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="permission" value="{{ $permission->id }}">
                    <button class="btn btn-danger btn-sm delete" type="button"><i class="ti ti-trash"></i></button>
                    </form>
                    <a href="{{ route('find.permission', $permission->id) }}" class="btn btn-info btn-sm"><i class="ti ti-edit"></i></a>
                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
