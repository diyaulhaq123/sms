@if ($students)

@foreach ($students as $row)
<option value="{{ $row->id }}">{{ $row->last_name.' '.$row->first_name }}</option>
@endforeach

@else
<option value="">No student available</option>
@endif
