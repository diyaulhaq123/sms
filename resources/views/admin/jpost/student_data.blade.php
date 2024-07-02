<div class="row bg-light p-2">
    <div class="col-8 my-2"><strong> {{ $student->last_name.' '.$student->first_name }} </strong></div>
    <div class="col-4 my-2"><strong> {{ $student->class->name }} </strong></div>
</div>
<input type="hidden" name="student_id" id="student_id" value="{{ $student->id }}">
<input type="hidden" name="admission_no" id="admission_no" value="{{ $student->admission_no }}">
