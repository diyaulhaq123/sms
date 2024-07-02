@extends('layouts.view')
@section('page-title')
Events
@endsection
@section('card-header')
Events
@endsection
@section('body')
<div class="card">
    <h5 class="card-header">Events</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Title</th>
            <th>Date</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=1; @endphp
            @forelse ($events as $event)
          <tr>
            <td>{{ $sn++ }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->date }}</td>
            <td>{{ $event->description }}</td>
            <td>
                <div class="btn-group">
                    <form action="{{route('delete.event')}}" method="post" >
                        @csrf
                        <input type="hidden" value="{{ $event->id }}" name="id" class="id">
                    <button class="btn btn-danger btn-sm delete" type="button" id="delete"><i class="ti ti-trash"></i></button>
                    </form>
                    <button class="btn btn-info btn-sm"
                    type="button" id="edit"
                    class="btn btn-primary"
                    data-id="{{ $event->id }}"
                    data-bs-toggle="modal"
                    data-bs-target="#addNewCCModal">
                    <i class="ti ti-edit"></i></button>
                </div>
            </td>
            @empty
            <td colspan="5"><div class="alert alert-danger text-center">No events found</div></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
</div>
<!-- Edit event -->
<div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5" >
        <div class="modal-body modalBody" id="modalBody">
        </div>
      </div>
    </div>
</div>
<!--/ Edit event -->
@endsection


