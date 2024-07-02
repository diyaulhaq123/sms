<div class="row mb-2">
    <div class="col-8"> {{ $grade->student->last_name.' '.$grade->student->first_name }} </div>
    <div class="col-4">{{ $grade->student->class->name }}</div>
</div>
<input type="hidden" name="student_id" id="student_id" value="{{ $grade->student->id }}">
<input type="hidden" name="admission_no" id="admission_no" value="{{ $grade->student->admission_no }}">

<input type="hidden" name="id" id="id" value="{{ $grade->id }}">
<input type="hidden" name="subject_id" id="subject_id" value="{{ $grade->subject_id }}">
    <input type="hidden" name="class_id" id="class_id" value="{{ $grade->class_id }}">
    <input type="hidden" name="session_id" value="{{ $grade->session_id }}">
    <input type="hidden" name="term_id" value="{{ $grade->term_id }}">

<div class="row g-2">
    <div class="col mb-0">
        <label for="ca1" class="form-label">CA 1</label>
        <input type="number" id="ca1" name="ca1" class="form-control" max="20" placeholder="CA 1" value="{{ $grade->ca1 }}"  />
    </div>
    <div class="col mb-0">
        <label for="ca3" class="form-label">CA 2</label>
        <input type="number" id="ca2" name="ca2" class="form-control" max="20" placeholder="CA 2" value="{{ $grade->ca2 }}"/>
    </div>
</div>
<div class="row g-2">
    <div class="col mb-0">
        <label for="ca2" class="form-label">CA 3</label>
        <input type="number" id="ca2" name="ca3" class="form-control" max="20" placeholder="CA 3" value="{{ $grade->ca3 }}"/>
    </div>
    <div class="col mb-0">
        <label for="exams" class="form-label">Exams</label>
        <input type="number" id="exam" name="exam" class="form-control" placeholder="Exams" value="{{ $grade->exam }}"/>
    </div>
</div>
