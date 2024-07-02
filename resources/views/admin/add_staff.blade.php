@extends('layouts.view')
@section('page-title')
Staff Registration
@endsection
@section('card-header')
Register Staff
@endsection
@section('body')
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <label for="">What task do you want to perform ?</label>
        <select name="task" id="task" class="form-select form-select-sm">
            <option value="">- Select -</option>
            <option value="register">Register Staff</option>
            <option value="update_bio">Update Staff Bio-data</option>
        </select>
    </div>
    <div class="col-lg-6 col-sm-12" id="staff-select">
        <label for="">Staff List</label>
        <select name="staff_id" id="staff_id" class="form-select form-select-sm select2">
            <option value="">- Select -</option>
            @foreach ($staffs as $staff)
            <option value="{{ $staff->id }}">{{ $staff->name ?? 'NA' }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="my-3" id="reg">
    <hr>
    <form action="{{route('create.staff')}}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-lg-5 col-sm-12 my-2">
                <div class="my-2">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Full Name">
                    @error('name')
                        <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Email">
                    @error('email')
                        <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                    @enderror
                </div>
                <div class=" my-2">
                    <label for="">Staff Type</label><br>
                    <div class="form-control form-control-sm">
                        <input type="radio" class="form-radio" name="type" id="type" value="teacher" checked>
                        <label for="" class="mx-1">Teacher</label>

                        <input type="radio" class="form-radio" name="type" id="type" value="accountant">
                        <label for="" class="mx-1">Accountant</label>

                        <input type="radio" class="form-radio" name="type" id="type" value="eo">
                        <label for="" class="mx-1">Exam Officer</label>
                    </div>
                    @error('type')
                        <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control form-control-sm" name="phone" id="phone" placeholder="Phone Number">
                    @error('phone')
                        <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-5 my-3">
                    <button class="btn btn-success btn-sm">Register</button>
                </div>
            </div>
        </div>

    </form>
    <hr>
</div>

@endsection
@section('second-card')
    <div class="" id="staff_form">

    </div>


@endsection

