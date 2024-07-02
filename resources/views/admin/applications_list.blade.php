@extends('layouts.view')
@section('page-title')
Application List
@endsection
@section('card-header')
List of Applications
@endsection
@section('body')

<div class="table-responsive text-nowrap">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th>SN</th>
          <th>Name</th>
          <th>Class</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          @php $sn=0; @endphp
          @forelse ($applications as $row)
        <tr>
          <td>{{ ++$sn }}</td>
          <td>{{ $row->last_name ?? 'NA' .' '.$row->first_name ?? 'NA' }}</td>
          <td>{{ $row->class->name ?? 'NA' }}</td>
          <td>{!! ($row->status == 1) ? '<span class="badge bg-success me-1">Admitted</span>' : '<span class="badge bg-warning me-1">Pending</span>' !!}</td>
          <td>
              <div class="btn-group">
                  <button class="btn btn-danger btn-sm delete" type="button"><i class="ti ti-trash"></i></button>
                  <button class="btn btn-info btn-sm"><i class="ti ti-edit"></i></button>
              </div>
          </td>
          @empty
          <td colspan="5"><div class="alert alert-info text-center">No applications available</div></td>
        </tr>
        @endforelse

      </tbody>
    </table>
  </div>

@endsection
