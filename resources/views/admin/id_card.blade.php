@extends('layouts.view')
@section('page-title')
ID Cards
@endsection
@section('card-header')
Card
@endsection
@section('body')

<style>
    /* Add your ID card styling here */
    .id-card {
        width: 300px;
        height: 100%;
        border-radius: 10px !important;
        /* border: 1px solid #000; */
        padding: 10px;
        background-clip: padding-box;
        box-shadow: 0 0.25rem 1.125rem rgba(75, 70, 92, 0.1);
    }
    .id-row{
        background: rgb(108, 101, 101);
        margin: 0px;
        border-radius: 2px;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        .first{
            visibility: hidden;
        }

    .id-row{
        background: rgb(108, 101, 101) !important;
        margin: 0px;
        border-radius: 2px;
    }
        .id-card-rows, .id-card-rows * {
            visibility: visible;
        }
        .id-card-rows {
            position: relative;
            left: 0;
            top: 0;
        }
    }

</style>

<div class="col-2 my-2 first">
    <button class="btn btn-info btn-ptint">Print <i class="ti ti-printer"></i></button>
</div>

<div class="row id-card-rows">

    <div class="col-6">
        <div class="id-card p-0">
            <div class="id-row py-2 ">
                <h5 class="m-0 p-2 text-white"><img src="{{ asset('dashboard/img/newLogo.jpg') }}" class="rounded-circle" height="20px"  width="30px"> Islamic International School</h5>
            </div>
            <div class="inner p-3">
                <div class="text-center justify-content-center my-1"><img src="{{ asset('dashboard/img/avatars/5.png') }}" class="rounded-circle" alt="" width="100px"></div>
                <p class="">Name: <b>{{ $student->last_name .' '. $student->first_name }}</b></p>
                <p class="">Admission No: <b>{{ $student->admission_no }}</b></p>
                <p class="">Class: <b>{{ $student->class->name }}</b></p>
                <p class="">State: <b>{{ $student->state->name }}</b></p>
                <p class="">Year of expiry: Year</p>
            </div>
            <div class="id-row py-2">..</div>
        </div>
    </div>

    <div class="col-6">
        <div class="id-card p-0">
            <div class="id-row py-2 ">
                <h5 class="m-0 p-2 text-white"><img src="{{ asset('dashboard/img/newLogo.jpg') }}" class="rounded-circle" height="20px"  width="30px"> Islamic International School</h5>
            </div>
            <div class="inner p-3">
                <div class="text-center justify-content-center my-1"><img src="{{ asset('dashboard/img/newLogo.jpg') }}" class="rounded-circle" alt="" width="100px"></div>
                <p class="my-4"><b><i>On the Authority of {!!'School name'!!}: Please if lost and found please return to {!!'School address'!!} </i></b></p>
                <p class="text-center">Sign: <i class="">Sign....</i></p>
            </div>
            <div class="id-row py-2 mt-4"><h6 class="m-0 p-2 text-white"><img src="{{ asset('dashboard/img/newLogo.jpg') }}" class="rounded-circle" height="20px"  width="30px"> Islamic International School</h6></div>
        </div>
    </div>

</div>

@endsection
