@extends('layouts.view')
@section('page-title')
Page Title
@endsection
@section('card-header')
Card header
@endsection
@section('body')
<form action="#" method="post">
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

</form>
@endsection
@section('second-card')

<div class="card">
    <h5 class="card-header">Header</h5>
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
          <tr>
            <td></td>
            <td></td>
            <td><span class="badge bg-label-success me-1">Active</span></td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-danger btn-sm delete" type="button"><i class="ti ti-trash"></i></button>
                    <button class="btn btn-info btn-sm"><i class="ti ti-edit"></i></button>
                </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
</div>

@endsection
