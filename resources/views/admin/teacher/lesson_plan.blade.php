@extends('layouts.view')
@section('page-title')
Lesson Plan
@endsection
@section('card-header')
    @if(!$allocations)
    <b>Subject allocations</b>
    @else
    <strong>Add lesson plan </strong>
    @endif
@endsection
@section('body')
@if(!$allocations)
<table class="table table-sm" >
    <thead>
        <tr>
            <th>#</th>
            <th>Subject</th>
            <th>Class</th>
            <th>Session</th>
            <th>Term</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subject_allocations as $row)
        <tr>
            <th>#</th>
            <td>{{ $row->subject->name }}</td>
            <td>{{ $row->class->name }}</td>
            <td>{{ $row->session->name }}</td>
            <td>{{ $row->term->name }}</td>
            <td><a href="{{ route('lesson_plan.open', [$row->class_id,$row->subject_id,$row->wing]) }}" class="btn btn-info btn-sm">Add Lesson Plan</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@else

<div class="card-title"><b>Add new lesson plan for "{{ $allocations->subject->name }}", ({{ $allocations->class->name }})</b></div>
<form action="{{ route('create.lesson_plan') }}" method="post">
    @csrf
    @method('post')
    <div class="row">
        <input type="hidden" value="{{ $allocations->session_id }}" name="session_id" id="session_id">
        <input type="hidden" value="{{ $allocations->term_id }}" name="term_id" id="term_id">
        <input type="hidden" value="{{ $allocations->class_id }}" name="class_id" id="class_id">
        <input type="hidden" value="{{ $allocations->subject_id }}" name="subject_id" id="subject_id">
        <input type="hidden" value="{{ auth()->user()->id }}" name="staff_id" id="staff_id">
        <input type="hidden" value="{{ auth()->user()->school_id }}" name="school_id" id="school_id">

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Topic</label>
                <input type="text" class="form-control form-control-" placeholder="Topic" name="topic" id="topic" value="{{ old('topic') }}">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Sub-topic</label>
                <input type="text" class="form-control form-control-" placeholder="Sub-Topic" value="{{ old('sub_topic') }}" name="sub_topic" id="sub_topic">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Duration</label>
                <input type="text" class="form-control form-control-" value="{{ old('duration') }}" placeholder="Duration in minutes" name="duration" id="duration">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Date</label>
                <input type="date" class="form-control form-control-" name="date" id="date" value="{{ old('date') }}">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Reference</label>
                <input type="text" class="form-control form-control-" value="{{ old('reference') }}" placeholder="References" name="reference" id="reference">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Behaviour/Reaction</label>
                <textarea type="text" class="form-control form-control-" placeholder="Behaviour/Reaction" name="behaviour" id="behaviour" value="{{ old('behaviour') }}"></textarea>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mt-auto pb-2">
            <button class="btn btn-primary btn-md col-12" type="submit">Save</button>
        </div>

    </div>
</form>

@endif


@endsection


@section('second-card')
<div class="card p-3">
    <div class="card-title"><b>My Lesson Plans</b></div>
    <table class="table table-sm" id="myTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Class</th>
                <th>Session</th>
                <th>Term</th>
                <th>Action</th>
                <th>Reviewed</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lesson_plan as $row)
            <tr>
                <td>#</td>
                <td>{{ $row->subject->name }}</td>
                <td>{{ $row->class->name }}</td>
                <td>{{ $row->session->name }}</td>
                <td>{{ $row->term->name }}</td>
                <td>
                    <button class="btn btn-primary btn-sm edit" data-bs-target="#smallModal2" data-bs-toggle="modal" data-id="{{ $row->id }}"><i class="fa fa-eye"></i></button>
                </td>
                <td>
                    @if ($row->remark == '')
                        <button class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i></button>
                    @else
                        <button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button> 
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Lesson Plan update/edit 2 -->
<div class="modal fade" id="smallModal2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel22">Update Lesson Plan </h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
            <div class="modal-body">
            <form action="{{ route('update.lesson_plan') }}" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="" id="lesson_plan"></div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>


@section('scripts')
    <script>
        $(document).ready(function(){
            $('.edit').click(function(){
                var token = "{{ csrf_token() }}";
                var id = $(this).data('id');
                $.post('/edit-lesson-plan', {_token:token, id:id }, function(data){
                    $('#lesson_plan').html(data);
                });
            });
        });
    </script>
@endsection


@endsection

