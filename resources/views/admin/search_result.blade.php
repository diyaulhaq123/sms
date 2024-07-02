@extends('layouts.view')
@section('page-title')
Search Result
@endsection
@section('card-header')
Find Result
@endsection
@section('body')
<form action="{{ route('view.result') }}" method="get">
    @method('get')
    @csrf
    <div class="row align-items-end">

            <div class="col-lg-4 col-sm-12 my-2">
                <label for=""> Class Category</label>
                <select type="text" class="form-select form-select-sm" name="class_category_id" id="class_category_id">
                    <option value="">- Class Category -</option>
                    @foreach ($class_categories as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('class_category_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 col-sm-12 my-2">
                <label for=""> Class</label>
                <select type="text" class="form-select form-select-sm" name="class_id" id="class_id">
                    <option value="">- Class -</option>
                </select>
                @error('class_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 col-sm-12 my-2">
                <label for=""> Wing</label>
                <select type="text" class="form-select form-select-sm" name="wing" id="wing">
                    <option value="">- Wing -</option>
                    @foreach ($wings as $row)
                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('wing')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 col-sm-12 my-2">
                <label for=""> Student</label>
                <select type="text" class="form-select form-select-sm" name="student_id" id="student_id">
                    <option value="">- Student -</option>
                </select>
                @error('student_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 col-sm-12 my-2">
                <label for=""> Session </label>
                <select type="text" class="form-select form-select-sm" name="session_id" id="session_id">
                    <option value="">- Session -</option>
                    @foreach ($sessions as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('session_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-lg-4 col-sm-12 my-2">
                <label for=""> Term</label>
                <select type="text" class="form-select form-select-sm" name="term_id" id="term_id">
                    <option value="">- Term -</option>
                    @foreach ($terms as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
                @error('term_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-3 col-sm-6">
                <button class="btn btn-success btn-sm mt-2">Query <div class="mx-1"></div><i class="ti ti-search"></i></button>
            </div>
    </div>

</form>
@endsection
@section('second-card')


<script>
    $(document).ready(function(){

        $('#class_id, #wing').change(function(){
            var wing = $('#wing').val();
            var class_id = $('#class_id').val();
            var token = '{{ csrf_token() }}';
            $.post('{{ route('get.students') }}', {wing:wing, class_id:class_id, _token:token}, function(data){
                $('#student_id').html(data);
            });
        });

    });
</script>

@endsection
