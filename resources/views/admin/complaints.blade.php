@extends('layouts.view')
@section('page-title')
Complaints
@endsection
@section('card-header')
Complaint List
@endsection
@section('body')
<div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>SN</th>
          <th>From</th>
          <th>Account Type</th>
          <th>Subject</th>
          <th>Status</th>
          <th>Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
          @php $sn=0; @endphp
        @forelse ($complaints as $row)
            <tr>
                <td>{{ ++$sn }}</td>
                <td>{{ $row->user->name }}</td>
                <td>{{ $row->user->type }}</td>
                <td>{{ $row->subject }}</td>
                <td>
                    {!! $row->status == 0 ? '<button class="btn btn-warning btn-sm me-1">Pending</button>'  :  '<button class="btn btn-success btn-sm me-1">Resolved</button>' !!} 
                </td>
                <td>{{ $row->created_at->diffForHumans() }}</td>
                <td>
                    <div class="btn-group">
                    <form action="{{ route('update.complaint') }}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" value="{{ $row->id }}" name="id">
                        @if($row->status == 0)
                        <button class="btn btn-success btn-sm confirm" type="button"><i class="ti ti-check"></i></button>
                        @endif
                    </form>
                    <button class="btn btn-info btn-sm view " data-id="{{ $row->id }}"><i class="ti ti-eye"></i></button>
                    <form action="{{ route('delete.complaint') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{ $row->id }}">
                    <button class="btn btn-danger btn-sm delete" type="button"><i class="ti ti-trash"></i></button>
                    </form>
                    </div>
                </td>
                @empty
                <td colspan="6" class="text-center"><div class="alert alert-danger text-center">No complaint available</div></td>
            </tr>
            
        @endforelse
      </tbody>
    </table>
  </div>
@endsection

