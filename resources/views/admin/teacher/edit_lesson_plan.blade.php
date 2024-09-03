
    <div class="row">
        <input type="hidden" value="{{ $lesson_plan->id }}" name="id" id="id">
        <input type="hidden" value="{{ $lesson_plan->session_id }}" name="session_id" id="session_id">
        <input type="hidden" value="{{ $lesson_plan->term_id }}" name="term_id" id="term_id">
        <input type="hidden" value="{{ $lesson_plan->class_id }}" name="class_id" id="class_id">
        <input type="hidden" value="{{ $lesson_plan->subject_id }}" name="subject_id" id="subject_id">
        <input type="hidden" value="{{ auth()->user()->id }}" name="staff_id" id="staff_id">
        <input type="hidden" value="{{ auth()->user()->school_id }}" name="school_id" id="school_id">

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Topic</label>
                <input type="text" class="form-control form-control-" placeholder="Topic" name="topic" id="topic" value="{{ $lesson_plan->topic }}">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Sub-topic</label>
                <input type="text" class="form-control form-control-" placeholder="Sub-Topic" value="{{ $lesson_plan->sub_topic }}" name="sub_topic" id="sub_topic">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Duration</label>
                <input type="text" class="form-control form-control-" value="{{ $lesson_plan->duration }}" placeholder="Duration in minutes" name="duration" id="duration">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Date</label>
                <input type="date" class="form-control form-control-" name="date" id="date" value="{{ $lesson_plan->date }}">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Reference</label>
                <input type="text" class="form-control form-control-" value="{{ $lesson_plan->reference }}" placeholder="References" name="reference" id="reference">
            </div>
        </div>

        <div class="col-lg-4 col-sm-12 mb-2">
            <div class="form-group">
                <label for="">Behaviour/Reaction</label>
                <textarea type="text" class="form-control form-control-" placeholder="Behaviour/Reaction" name="behaviour" id="behaviour" value="">{{ $lesson_plan->behaviour }}</textarea>
            </div>
        </div>


    </div>