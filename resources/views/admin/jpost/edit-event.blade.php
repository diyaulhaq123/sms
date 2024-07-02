
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    <div class="text-center mb-4">
      <h3 class="mb-2">Edit event</h3>
    </div>
    <form class="event-form pt-0" action="{{route('edit.calendar')}}" method="post" id="eventForm" >
      @method('patch')
      @csrf
      <input type="hidden" name="id" value="{{ $event->id }}">
      <div class="mb-3">
      <label class="form-label" for="eventTitle">Event Title</label>
      <input
          type="text"
          class="form-control"
          id="title"
          value="{{ $event->title }}"
          name="title"
          placeholder="Event Title" />
      </div>

      <div class="mb-3">
      <label class="form-label" for="eventStartDate">Date</label>
      <input
          type="text"
          class="form-control "
          {{-- id="date" --}}
          value="{{ $event->date }}"
          placeholder="YYYY-MM-DD" id="flatpickr-date"
          name="date"
          placeholder="Start Date" />
      </div>

      <div class="mb-3">
      <label class="form-label" for="eventDescription">Description</label>
      <textarea class="form-control" name="description" id="description" value="">{{ $event->description }}</textarea>
      </div>
      <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
      <div>
          <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">Update</button>
      </div>
      <div><button class="btn btn-label-danger btn-delete-event d-none">Delete</button></div>
      </div>
  </form>

