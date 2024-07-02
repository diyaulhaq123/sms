@foreach ($class as $clas)
<option value="{{ $clas->id }}"> {{ $clas->name }} </option>
@endforeach
