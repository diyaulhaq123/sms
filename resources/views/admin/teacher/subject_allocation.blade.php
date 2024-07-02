@extends('layouts.view')
@section('page-title')
My Subject allocations
@endsection
@section('card-header')
Allocations
@endsection
@section('body')
<p>Allocations for current session</p>
<div class="row">
    @forelse ($subject_allocations as $row)
    <div class="col-md-5 col-xl-5 col-sm-12">
        <div class="card bg-success text-white mb-3">
          <div class="card-header">{{$row->term->name}} - {{$row->session->name}}</div>
          <div class="card-body">
            <h5 class="card-title text-white">You where assigned to teach: <strong>{{$row->subject->name}}</strong></h5>
            <div class="card-text">Term: {{$row->term->name}}</div>
            <div class="card-text">Class: {{$row->class->name}}</div>
          </div>
        </div>
    </div>
    @empty
    <div class="col-md-6 col-xl-6 col-sm-12">
        <div class="card bg-danger text-white mb-3">
          <div class="card-header">Allocations - for {{$current_session->name}}</div>
          <div class="card-body">
            <h5 class="card-title text-white">You currently have no subject allocation for the term</h5>
            <div class="card-text">Subject: **** </div>
            <div class="card-text">Class: **** </div>
          </div>
        </div>
    </div>
    @endforelse

</div>

@endsection

{{-- @section('second-card')

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
                    <button class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></button>
                    <button class="btn btn-info btn-sm"><i class="ti ti-edit"></i></button>
                </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
</div>

@endsection --}}
