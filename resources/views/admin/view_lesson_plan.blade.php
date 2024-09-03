@extends('layouts.view')
@section('page-title')
Teacher's Lesson Plan
@endsection
@section('card-header')
    <strong> Staff Name:{{ $lesson_plan->staff->name }}  </strong>
@endsection
@section('body')

<div class="row">
    <div class="card-title">
        <p><strong>Lesson plan for "{{ $lesson_plan->subject->name }}", ({{ $lesson_plan->class->name }})</strong></p>
    </div>
<form action="{{ route('admin.update.lesson_plan') }}" method="post">
    @csrf
    @method('patch')
    <div class="row">
        <input type="hidden" value="{{ $lesson_plan->id }}" name="id" id="id">
        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Topic</label>
                <input type="text" disabled class="form-control form-control-" placeholder="Topic" name="topic" id="topic" value="{{ $lesson_plan->topic }}">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Sub-topic</label>
                <input type="text" disabled class="form-control form-control-" placeholder="Sub-Topic" value="{{ $lesson_plan->sub_topic }}" name="sub_topic" id="sub_topic">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Duration</label>
                <input type="text" disabled class="form-control form-control-" value="{{ $lesson_plan->duration }}" placeholder="Duration in minutes" name="duration" id="duration">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Date</label>
                <input type="date" disabled class="form-control form-control-" name="date" id="date" value="{{ $lesson_plan->date }}">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Reference</label>
                <input type="text" disabled class="form-control form-control-" value="{{ $lesson_plan->reference }}" placeholder="References" name="reference" id="reference">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Behaviour/Reaction</label>
                <textarea type="text" disabled class="form-control form-control-" placeholder="Behaviour/Reaction" name="behaviour" id="behaviour" value="">{{ $lesson_plan->behaviour }}</textarea>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Remark</label>
                <textarea type="text" class="form-control form-control-" placeholder="Enter supervisor's remark here" name="remark" id="remark" value="{{ old('remark') }}" >{{ $lesson_plan->remark }}</textarea>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12 mt-auto pb-2">
            <button class="btn btn-primary btn-md col-lg-3" type="submit">Save</button>
            <a href="{{ route('lesson_plan.index') }}" class="btn btn-danger btn-md col-lg-3">Back</a>
        </div>

    </div>
</form>
</div>

@endsection
