@extends('layouts.view')
@section('page-title')
Staff Edit
@endsection
@section('card-header')
Edit Staff Profile
@endsection
@section('body')
<form action="#" method="post">
    @csrf
    <div class="row">
        <div class="col-md-4">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="first_name" value="" placeholder="First Names" >
        </div>
        <div class="col-md-4">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="" placeholder="Last Names" >
        </div>

        <div class="col-md-4">
            <label for="">Phone</label>
            <input type="text" class="form-control" name="phone" value="" placeholder="Phone Number">
        </div>

        <div class="col-md-4">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" value="" placeholder="Email" >
        </div>

        <div class="col-md-4">
            <label for="">Staff ID</label>
            <input type="text" class="form-control" disabled="" name="staff_id" placeholder="Staff ID" value="" >
            <input type="hidden" value="" name="staff_id">
        </div>

        <div class="col-md-4">
            <label for="">Staff Type</label>
            <select type="select" class="form-control form-select" name="staff_type_id" id="staff_type_id">
                <option value="" selected="">- Select -</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="">State</label>
            <select type="select" class="form-control select2" name="state_id" id="state_id">
                <option value=""></option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="">LGA</label>
            <select type="select" class="form-control select2" name="lga_id" id="lga_id">
                <option value="">Select Lga</option>
            </select>
        </div>

        <div class="col-md-4">
            <label for="">Address</label>
            <textarea name="address" id="address" cols="30" rows="4" class="form-control">
            </textarea>
        </div>

        <div class="col-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>

    </div>

</form>
@endsection
