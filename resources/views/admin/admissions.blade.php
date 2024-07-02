@extends('layouts.view')
@section('page-title')
Admissions
@endsection
@section('card-header')
Admissions
@can('admission_actions')
@endsection
@section('body')
<div class="row">

    @if ($admission)

    <div class="col-lg-6 col-sm-12" style="border-left: 1px solid rgb(35, 35, 35)">
        <form action="{{ route('admission.close') }}" method="post">
            @method('patch')
            @csrf
            <input type="hidden" value="{{ $admission->id }}" name="id">
            <div class="row align-items-end">
                    <div class="col-lg-8 col-sm-12">
                        <label for="">Session</label>
                        <select class="form-select form-select-sm" name="session_id">
                            <option value="">- Select -</option>
                            @foreach ($sessions as $session)
                            <option value="{{ $session->id ?? '' }}" {{ $session->id == $admission->session_id ? 'selected' : '' }}>{{ $session->name }}</option>
                            @endforeach
                        </select>
                        @error('session_id')
                        <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-sm-6 ">
                        <button class="btn btn-danger btn-sm">Close Application</button>
                    </div>
            </div>

        </form>
    </div>

    @else

    <div class="col-lg-6 col-sm-12" style="border-right: 1px solid rgb(35, 35, 35)">
        <form action="{{ route('admission.begin') }}" method="post">
            @csrf
            <div class="row align-items-end">
                    <div class="col-lg-8 col-sm-12">
                        <label for="">Session</label>
                        <select class="form-select form-select-sm" name="session_id">
                            <option value="">- Select -</option>
                            @foreach ($sessions as $session)
                            <option value="{{ $session->id ?? '' }}">{{ $session->name ?? ''  }}</option>
                            @endforeach
                        </select>
                        @error('session_id')
                        <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-4 col-sm-6 ">
                        <button class="btn btn-success btn-sm">Begin Application</button>
                    </div>
            </div>

        </form>
    </div>

    @endif

</div>
@endsection
@endcan
@section('second-card')

<div class="card">
    <h5 class="card-header">Admissions</h5>
    <div class="table-responsive text-nowrap p-3">
      <table class="table" id="myTable">
        <thead>
          <tr>
            <th></th>
            <th>SN</th>
            <th>Session</th>
            <th>Status</th>
            @can('admission_actions')
            <th>Action</th>
            @endcan
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @foreach ($admissions as $admission)
          <tr>
            <td></td>
            <td>{{ ++$sn }}</td>
            <td>{{ $admission->session->name ?? 'NA'  }}</td>
            <td>
                <form action="{{ route('toggle.admission') }}" method="post">
                    @csrf
                    @method('patch')
                    <input name="id" type="hidden" value="{{ $admission->id }}">
                {!! $admission->status == 1 ? '<button class="btn btn-success btn-sm">Active</button>' : '<button class="btn btn-danger btn-sm">Closed</button>' !!}
                </form>
            </td>
            @can('admission_actions')
            <td>
                <div class="btn-group">
                    <a href="{{ route('find.admission', $admission->id) }}" class="btn btn-info btn-xs"><i class="ti ti-edit"></i></a>
                    <button class="btn btn-danger btn-xs delete" type="button"><i class="ti ti-trash"></i></button>
                </div>
            </td>
            @endcan
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>

@endsection
