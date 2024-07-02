@extends('layouts.view')
@section('page-title')
Time table
@endsection
@section('card-header')
Time table
@endsection
@section('body')

<button class="btn btn-info" data-bs-target="#addTimeTable" data-bs-toggle="modal">Add schedule <i class="ti ti-plus"></i></button>
{{-- MODAL FOR ADDING SHEDULE --}}
<div class="modal fade" id="addTimeTable" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content  p-md-5" >
        <div class="modal-body modalBody" id="modalBody">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
                <h3 class="mb-2">Add a schedule</h3>
            </div>
            <form action="{{ route('add.schedule') }}" method="post">
                @csrf
                <div class="row align-items-end">
                    <input type="hidden" name="session_id" value="{{ $current_session->id }}">
                    <input type="hidden" name="term_id" value="{{ $current_term->id }}">

                    <div class="col-lg-4 col-sm-12 my-2">
                        <label for=""> Class</label>
                        <select name="class_id" id="class_id" class="form-control form-select-sm">
                            <option value="">- Class -</option>
                            @foreach ($classes as $row)
                            <option value="{{ $row->id }}"> {{ $row->name }} </option>
                            @endforeach
                        </select>
                        @error('class_id')
                        <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-sm-12 my-2">
                        <label for=""> Wing</label>
                        <select name="wing" id="wing" class="form-control form-select-sm">
                            <option value="">- Wing -</option>
                            @foreach ($wings as $row)
                            <option value="{{ $row->name }}"> {{ $row->name }} </option>
                            @endforeach
                        </select>
                        @error('wing')
                        <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-sm-12 my-2">
                        <label for=""> Subject</label>
                        <select name="subject_id" id="subject_id" class="form-control form-select-sm">
                            <option value="">- Subject -</option>
                            @foreach ($subjects as $row)
                            <option value="{{ $row->id }}"> {{ $row->name }} </option>
                            @endforeach
                        </select>
                        @error('subject_id')
                        <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-sm-12 my-2">
                        <label for=""> Start Time </label>
                        <select name="start" id="start" class="form-control form-select-sm">
                            <option value="">- Starts -</option>
                            @foreach ($periods as $row)
                            <option value="{{ $row->id }}"> {{ $row->title }} </option>
                            @endforeach
                        </select>
                        @error('start')
                        <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-sm-12 my-2">
                        <label for=""> End Time </label>
                        <select name="end" id="end" class="form-control form-select-sm">
                            <option value="">- Ends -</option>
                            @foreach ($periods as $row)
                            <option value="{{ $row->id }}"> {{ $row->title }} </option>
                            @endforeach
                        </select>
                        @error('end')
                        <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-4 col-sm-12 my-2">
                        <label for=""> Day</label>
                        <select class="form-control form-select-sm" name="day" id="day">
                            <option value="">- Day -</option>
                            @foreach ($days as $row)
                            <option value="{{ $row->id }}"> {{ $row->title }} </option>
                            @endforeach
                        </select>
                        @error('day')
                        <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-3 col-sm-6">
                        <button class="btn btn-primary btn-sm mt-2">Save</button>
                    </div>
                </div>

            </form>
        </div>
      </div>
    </div>
</div>
{{-- MODAL FOR ADDING SHEDULE END --}}

<div class="row my-3">
    <div class="col-12"><h5>Query time table</h5></div>
    <div class="col-12">
        <form action="{{ route('view.class.time-table') }}" method="post">
            @csrf
            <div class="row align-items-end">
                <div class="col-lg-5 col-sm-12">
                    <label for="">Select Class</label>
                    <select name="class_id" id="class_id" class="form-select form-select-sm">
                        <option value=""> Class </option>
                        @foreach ($classes as $row)
                        <option value="{{ $row->id }}"> {{ $row->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <label for="">Select Wing</label>
                    <select name="wing" id="wing" class="form-select form-select-sm">
                        <option value="">Wing</option>
                        @foreach ($wings as $row)
                        <option value="{{ $row->name }}"> {{ $row->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-info btn-sm"><i class="ti ti-filter"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('second-card')

<div class="card">
    <h5 class="card-header">Schedules</h5>
    <div class="table-responsive text-nowrap px-3">
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th>SN</th>
            <th>Class</th>
            <th>Wing</th>
            <th>Subject</th>
            <th>Day</th>
            <th>From</th>
            <th>To</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @if ($schedules)
            @foreach ($schedules as $row)

          <tr>
            <td>{{ ++$sn }}</td>
            <td>{{ $row->class->name ?? 'NA' }}</td>
            <td><span class="badge bg-label-primary me-1">{{ $row->wing ?? 'NA' }}</span></td>
            <td>{{ $row->subject->name ?? 'NA' }}</td>
            <td><span class="badge bg-info">{{ $row->days->title ?? 'NA' }}</span></td>
            <td>{{ $row->start_time->title ?? 'NA' }}</td>
            <td>{{ $row->end_time->title ?? 'NA' }}</td>
            <td>
                <div class="btn-group">
                    <form action="#" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" id="id" value="{{ $row->id }}">
                        <button class="btn btn-danger btn-xs delete" type="button"><i class="ti ti-trash"></i></button>
                    </form>
                    <button class="btn btn-info btn-xs"><i class="ti ti-edit"></i></button>
                </div>
            </td>
          </tr>
            @endforeach
            @endif

        </tbody>
      </table>
    </div>
</div>

@endsection
