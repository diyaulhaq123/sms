@extends('layouts.view')
@section('page-title')
Uploaded Grades
@endsection
@section('card-header')
Uploaded Student Grades
@endsection
@section('body')

    <div class="row">
        <div class="col-5 p-2">
            <div class="card p-2">
                <form action="" method="get">
                        @method('get')
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <select name="class" id="" class="form-select select2">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <select name="session" id="" class="form-select select2">
                                    <option value="">Select Session</option>
                                    @foreach ($sessions as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <select name="term" id="" class="form-select select2">
                                    <option value="">Select Term</option>
                                    @foreach ($terms as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <select name="subject" id="" class="form-select select2">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6 my-3">
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm" type=""><i class="ti ti-eye"></i></button>
                            </div>
                        </div>
                </form>
            </div>
        </div>

        @if ($grades != '' ) 
        <div class="col-7">
            <div class="card p-2">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Student</th>
                                <th>Total</th>
                                <th>Grade</th>
                                <th style="font-size:12px">Uploaded By</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grades as $row)
                            <tr>
                                <td>#</td>
                                <td>{{ $row->student->admission_no}}</td>
                                <td>{{ $row->total }}</td>
                                <td>{{ $row->grade }}</td>
                                <td>{{ $row->staff->staff->staff_id }}</td>
                                <td><button class="btn btn-primary btn-sm grade"><i class="fa fa-eye"></i></button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
        <div class="col-3" id="open"></div>
    </div>
@section('scripts')
    <script>
        $(document).ready(function(){
            $('.grade').click(function(){
                var token = '{{ csrf_token() }}';
                $.post('eo/get-grade', { _token: token}, function(data){
                    $('#open').html(data);
                });
            });
        });
    </script>
@endsection

@endsection
