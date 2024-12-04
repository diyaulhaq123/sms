@extends('layouts.master')
@section('title')
Payments
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Payments  @endslot
@endcomponent

<div class="row">

    <div class="card p-4">
        <div class="card-header">
            <a class="btn btn-primary float-end" href="#" > <i class="ri-add-circle-line"></i> Make Payment</a>
        </div>
        <div class="card-body">
            <div class="card-title fw-bold">Payments</div>
           <div class="row justify-content-center">
            <div class="col-10">
                <div class="table table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
           </div>
        </div>
    </div>

</div>

@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>

@endsection
