@extends('layouts.view')
@section('page-title')
Staff
@endsection
@section('card-header')
Staff List
@endsection
@section('body')

<div class="card">
    <h5 class="card-header">List</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Staff ID</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><span class="badge bg-label-success me-1">Active</span></td>
            <td>
                <form action="#" method="post">
                    @csrf
                    <input type="hidden" value="" name="" id="">
                <div class="btn-group">

                    <button class="btn btn-info btn-xs"><i class="ti ti-edit"></i></button>
                    <button class="btn btn-danger btn-xs delete" type="button"><i class="ti ti-trash"></i></button>
                </div>
                </form>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
</div>




@endsection
