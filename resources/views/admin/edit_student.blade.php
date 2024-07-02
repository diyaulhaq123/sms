@extends('layouts.view')
@section('page-title')
Edit Student
@endsection
@section('card-header')
Edit Student profile
@endsection
@section('body')
<form action="#" method="post">
    @csrf
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-3 col-sm-12">
                <label for="">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="">
                @error('last_name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-sm-12">
                <label for="">First Name</label>
                <input type="text" class="form-control" name="first_name" value="">
                @error('first_name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-sm-12">
                <label for="">Other Name</label>
                <input type="text" class="form-control" name="other_name" value="">
                @error('other_name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-3 col-sm-12">
                <label for="">Select Guardian</label>
                <select type="text" class="form-control" name="guardian_id" value="">
                    <option value="">- Select -</option>
                </select>
                @error('guardian_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-12">
                <label for="">Class Category</label>
                <select type="text" class="form-control" name="class_category_id" id="class_category_id" value="">
                    <option value="">- Select -</option>
                </select>
                @error('class_category_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-12">
                <label for="">Class</label>
                <select type="text" class="form-control" name="class_id" id="class_id" value="">
                    <option value="">- Select -</option>
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-12">
                <label for="">Wing</label>
                <select type="text" class="form-control" name="wing" value="">
                    <option value="">- Select -</option>
                </select>
                @error('class_category_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-12">
                <label for="">Admission Number</label>
                <input type="text" class="form-control" name="admission_no" value="">
                @error('admission_no')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
                <input type="hidden" name="admission_no" value="">
            </div>

            <div class="col-lg-3 col-sm-12">
                <label for="">State</label>
                <select type="text" class="form-control" name="state_id" id="state_id" value="">
                    <option value="">- Select -</option>
                </select>
                @error('state_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-12">
                <label for="">Lga</label>
                <select type="text" class="form-control" name="lga_id" id="lga_id" value="">
                    <option value="">- Select -</option>
                </select>
                @error('lga_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-3 col-sm-12">
                <label for="">Lga</label>
                <textarea type="text" class="form-control" name="address">

                </textarea>
                @error('address')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-3 col-sm-6">
                <button class="btn btn-success">Update</button>
            </div>
    </div>

</form>
@endsection
