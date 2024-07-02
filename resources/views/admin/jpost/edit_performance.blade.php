@if (!$allocation)
    <div class="alert alert-danger text-center">You do not have access to this resources</div>
@else

        <input type="hidden" name="student_id" id="student_id" value="{{ $student->student_id }}">
        <input type="hidden" name="id" id="id" value="{{ $student->id }}">
      <input type="hidden" name="session_id" value="{{ $session->id }}">
      <input type="hidden" name="term_id" value="{{ $term->id }}">
      <input type="hidden" name="class_id" value="{{ $class_id }}">
      <input type="hidden" name="wing" value="{{ $wing }}">
      <input type="hidden" name="staff_id" value="{{ auth()->user()->id }}">

        <div class="row">
          <div class="col-lg-4">
            <label for="" class="text-white">Puntuality</label>
            <input type="number" class="form-control" max="10" name="punctuality" value="{{ $student->punctuality }}" >
          </div>
          <div class="col-lg-4">
            <label for="" class="text-white">Neatness</label>
            <input type="number" class="form-control" max="10" name="neatness" value="{{ $student->neatness }}" >
          </div>
          <div class="col-lg-4">
            <label for="" class="text-white">Confidence</label>
            <input type="number" class="form-control" max="10" name="confidence" value="{{ $student->confidence }}">
          </div>
          <div class="col-lg-4">
            <label for="" class="text-white">Attendance</label>
            <input type="number" class="form-control" max="10" name="attendance" value="{{ $student->attendance }}">
          </div>
          <div class="col-lg-4">
            <label for="" class="text-white">Remark</label>
            <textarea type="text" class="form-control" rows="3" name="remark" >{{ $student->remark }}</textarea>
          </div>
          <div class="col-lg-4 d-flex align-items-end">
              <button class="btn btn-success" type="submit" id="">Update</button>
          </div>
        </div>

    </div>

<div class="text-start text-white opacity-50">{{ $student->student->last_name }} {{ $student->student->first_name }}</div>
@endif
