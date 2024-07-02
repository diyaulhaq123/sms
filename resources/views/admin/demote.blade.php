@extends('layouts.view')
@section('page-title')
Demoted Students
@endsection
@section('body')

<div class="card">
    <h5 class="card-header">
        {{-- - {{ $session->name }}</p> --}}
        <p>Move Students into Next Session 
        <p>Class - {{ $class->name }} | Current Session - {{ $session->name }}</p>
    </h5>
    <div class="form-check " style="margin-right:50px" >
        <input type="checkbox" style="float:right"  class="form-check" onchange="toggleCheckboxes()" name="master_check" id="master_check">
    </div>
    <form action="{{ route('demote.student') }}" method="post">
        @csrf
        @method('patch')
        <input type="hidden" name="class_id" value="{{ $class->id }}">
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Student Name</th>
            <th>Reg No</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @forelse ($students as $row)

          <tr>
            <td> {{ ++$sn }} </td>
            <td>{{ $row->last_name.' '.$row->first_name }}</td>
            <td><span class="badge bg-label-info me-1">{{ $row->admission_no}}</span></td>
            <td>
                <div class="form-check">
                    <input type="checkbox" class="form-check" name="student_id[]" id="student_id[]" value="{{ $row->id}}">
                </div>
            </td>
            @empty
            <td colspan="4" class="text-center">No student data found</td>
          </tr>
          @endforelse
        </tbody>
      </table>
      <button class="btn btn-success m-3" style="float:right">Demote</button>
    </div>
    </form>
</div>

<script>
    function toggleCheckboxes() {
        // Get the state of the master checkbox
        var masterCheckbox = document.getElementById("master_check");
        var isChecked = masterCheckbox.checked;
    
        // Get all the student checkboxes
        var studentCheckboxes = document.querySelectorAll('[id^="student_id"]');
    
        // Loop through each student checkbox and set its state to match the master checkbox
        studentCheckboxes.forEach(function(checkbox) {
            checkbox.checked = isChecked;
        });
    }
</script>
@endsection
