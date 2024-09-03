@extends('layouts.view')
@section('page-title')
Student/Child Result
@endsection
@section('card-header')
Result
@endsection
@section('body')

<div class="card">
    <div class="card-header"><b>Results For {{ $student->last_name.' '.$student->first_name }}</b></div>
    <div class="card-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-uppercase">#</th>
                            <th class="text-uppercase">Class</th>
                            <th class="text-uppercase">Session</th>
                            <th class="text-uppercase">Term</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <tr>
                            <td colspan="5">
                                <div class="alert alert-info text-center"> Previous Results </div>
                            </td>
                        </tr> --}}
                        @forelse ($results as $row)
                        <form action="{{ route('result.slip') }}" method="get">
                            @method('get')
                            <input type="hidden" name="class_id" value="{{ $row->class_id }}">
                            <input type="hidden" name="session_id" value="{{ $row->session_id }}">
                            {{-- <input type="hidden" name="term_id" value="{{ $row->term_id }}"> --}}
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <tr>
                            <td>#</td>
                            <td>{{ $row->class->name }}</td>
                            <td>{{ $row->session->name }}</td>
                            {{-- <td>{{ $row->term->name }}</td> --}}
                            <td>
                                <select class="form-select form-select-sm" name="term_id" id="term_id">
                                    <option value="" >Select term</option>
                                    @foreach ($terms as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-eye"></i></button>
                            </td>
                            @empty
                            {{-- <td colspan=5><div class="alert alert-info text-center">No previous result</div></td> --}}
                        </tr>
                        </form>
                        @endforelse

                        {{-- <tr>
                            <td colspan="5">
                                <div class="alert alert-info text-center"> Current Results </div>
                            </td>
                        </tr> --}}

                        @forelse ($current_results as $row)
                        <form action="{{ route('result.slip') }}" method="get">
                            @method('get')
                            @csrf
                            <input type="hidden" name="class_id" value="{{ $row->class_id }}">
                            <input type="hidden" name="session_id" value="{{ $row->session_id }}">
                            {{-- <input type="hidden" name="term_id" value="{{ $row->term_id }}"> --}}
                            <input type="hidden" name="student_id" value="{{ $student->id }}">

                        <tr>
                            <td>#</td>
                            <td>{{ $row->class->name }}</td>
                            <td>{{ $row->session->name }}</td>
                            {{-- <td>{{ $row->term->name }}</td> --}}
                            <td>
                                <select class="form-select form-select-sm" name="term_id" id="term_id">
                                    <option value="">Select term</option>
                                    @foreach ($terms as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-eye"></i></button>
                            </td>
                            @empty
                            {{-- <td colspan=5><div class="alert alert-info text-center">No current result</div></td> --}}
                        </tr>
                        </form>
                        @endforelse
                    </tbody>
                </table>
            </div>

    </div>
</div>


{{-- <form action="{{ route('result.slip') }}" method="get">
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

</form> --}}
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
