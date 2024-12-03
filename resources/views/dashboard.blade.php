@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Dashboard  @endslot
@endcomponent

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card p-3">
            <div class="card-body">
                <div class="card-title">******</div>
                Total Students
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card p-3">
            <div class="card-body">
                <div class="card-title">*****</div>
                Total Staffs
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card p-3">
            <div class="card-body">
                <div class="card-title">*****</div>
                Total Payments
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
