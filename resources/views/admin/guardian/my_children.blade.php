@use('App\Repositories\Guardian\GuardianRepository')
<?php
$guardian = new GuardianRepository;
?>
@extends('layouts.view')
@section('page-title')
Children
@endsection
@section('card-header')
My Children
@endsection
@section('body')

<div class="row g-4">
    @foreach ($children as $child)

    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
          <div class="card-body text-center">
            <div class="dropdown btn-pinned">
              <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-dots-vertical text-muted"></i>
              </button>
              {{-- <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:void(0);">Share connection</a></li>
                <li><a class="dropdown-item" href="javascript:void(0);">Block connection</a></li>
                <li>
              </ul> --}}
            </div>
            <div class="mx-auto my-3">
              <img src="{{ asset('dashboard/img/dummy.jpeg') }}" alt="Avatar Image" class="rounded-circle w-px-100">
            </div>
            <h4 class="mb-1 card-title text-uppercase">{{ $child->last_name. ' '. $child->first_name }}</h4>
            <span class="pb-1">{{ $child->class->name }}</span>
            <div class="d-flex align-items-center justify-content-center my-3 gap-2">
              <a href="{{ route('gurdian.result.index',$child->id) }}" class="me-1"><span class="badge bg-label-success">Grades</span></a>
              <a href="{{ route('guardian.child.payment', $child->id) }}"><span class="badge bg-label-info">Payments</span></a>
            </div>

            <div class="d-flex align-items-center justify-content-around my-3 py-1">
              <div>
                <h4 class="mb-0">0</h4>
                <span>Results</span>
              </div>
              <div>
                <h4 class="mb-0">{{ count($guardian->findChildPayment($child->id)) }}</h4>
                <span>Payments</span>
              </div>
              <div>
                <h4 class="mb-0">0</h4>
                <span>Complaints</span>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-center">
              {!! $child->status == 1 ? '<a href="javascript:;" class="btn btn-primary btn-sm d-flex align-items-center me-3 waves-effect waves-light"><i class="ti-xs me-1 ti ti-user-check me-1"></i>Active</a>'
              : '<a href="javascript:;" class="btn btn-danger btn-sm d-flex align-items-center me-3 waves-effect waves-light"><i class="ti-xs me-1 ti ti-user-x me-1"></i>In-Active</a>'
                !!}
            </div>
          </div>
        </div>
    </div>

    @endforeach

    </div>

@endsection

