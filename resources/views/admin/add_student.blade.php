@extends('layouts.view')
@section('page-title')
Student Registration
@endsection
@section('card-header')
Register Student
@endsection
@section('body')
<form action="{{ route('create.student') }}" method="post">
    @csrf

    <hr>
    <div class="col">Guardian Information</div>
    <hr>
    <div class="row p-2 ">
            @csrf
            <input type="hidden" value="guardian" name="type">
            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Name</label>
                <input type="text" class="form-control form-control-sm" name="name" value="{{ old('name') }}" placeholder="Name">
                @error('name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Email</label>
                <input type="text" class="form-control form-control-sm" name="email" value="{{ old('email') }}" placeholder="Email">
                @error('email')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Phone</label>
                <input type="text" class="form-control form-control-sm" name="phone" value="{{ old('phone') }}" placeholder="+23480........">
                @error('phone')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
    </div>
    <hr>
    <div class="col">Student Information</div><hr>

    <div class="row p-2 align-items-end">

            @csrf
            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name">
                @error('last_name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">First Name</label>
                <input type="text" class="form-control form-control-sm" name="first_name" value="{{ old('first_name') }}" placeholder="First Name">
                @error('first_name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Other Name</label>
                <input type="text" class="form-control form-control-sm" name="other_name" value="{{ old('other_name') }}" placeholder="Other Name">
                @error('other_name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Class Category</label>
                <select type="text" class="form-control form-control-sm" name="class_category_id" id="class_category_id" value="{{ old('class_category_id') }}">
                    <option value="">- Select -</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id ?? '' }}"> {{$category->name ?? '' }} </option>
                    @endforeach
                </select>
                @error('class_category_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Class</label>
                <select type="text" class="form-select form-select-sm" name="class_id" id="class_id" value="{{ old('class_id') }}">
                    <option value="">- Select -</option>
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Wing</label>
                <select type="text" class="form-select form-select-sm" name="wing" value="{{ old('wing') }}">
                    <option value="">- Select -</option>
                    @foreach ($wings as $wing)
                    <option value="{{$wing->name}}"> {{$wing->name}} </option>
                    @endforeach
                </select>
                @error('wing')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Admission Number</label>
                <input type="text" class="form-control form-control-sm" value="{{ $admission_no }}" readonly placeholder="Admission Number">
                <input type="hidden" value="{{ $admission_no }}" name="admission_no" id="admission_no">
                @error('admission_no')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">State</label>
                <select type="text" class="form-select form-select-sm" name="state_id" id="state_id" value="{{ old('state_id') }}">
                    <option value="">- Select -</option>
                    @foreach ($states as $state)
                    <option value="{{ $state->id ?? '' }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                @error('state_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">Lga</label>
                <select type="text" class="form-select form-select-sm" name="lga_id" id="lga_id" value="{{ old('lga_id') }}">
                    <option value="">- Select -</option>
                </select>
                @error('lga_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 my-2 col-sm-12">
                <label for="">House Address</label>
                <textarea type="text" class="form-control form-control-sm" name="address" rows="3" >{{ old('address') }}</textarea>
                @error('address')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>


            <div class="col-3 col-sm-6 my-2">
                <button class="btn btn-info ">Save</button>
            </div>
    </div>

    <hr>
</form>
{{-- <script>
    $(document).ready(function(){

    });
</script> --}}
@endsection

