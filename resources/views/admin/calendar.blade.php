@extends('layouts.view')
@section('page-title')
Calendar
@endsection
@section('card-header')
Calendar
@endsection
@section('body')
<div class="card app-calendar-wrapper">
    <div class="row g-0">
      <!-- Calendar Sidebar -->
      <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
        <div class="border-bottom p-4 my-sm-0 mb-3">
          <div class="btn-group ">
            <button
              class="btn btn-primary btn-toggle-sidebar"
              data-bs-toggle="offcanvas"
              data-bs-target="#addEventSidebar"
              aria-controls="addEventSidebar">
              <i class="ti ti-plus me-1"></i>
              <span class="align-middle"></span>
            </button>
            <a href="{{route('events')}}" class="btn btn-success"><i class="ti ti-eye"></i></a>
          </div>
        </div>
        <div class="p-3">
          <!-- inline calendar (flatpicker) -->
          <div class="inline-calendar"></div>

          <hr class="container-m-nx mb-4 mt-3" />

          <!-- Filter -->
          <div class="mb-3 ms-3">
            <small class="text-small text-muted text-uppercase align-middle">Filter</small>
          </div>

          <div class="form-check mb-2 ms-3">
            <input
              class="form-check-input select-all"
              type="checkbox"
              id="selectAll"
              data-value="all"
              checked />
            <label class="form-check-label" for="selectAll">View All</label>
          </div>

          <div class="app-calendar-events-filter ms-3">
            <div class="form-check form-check-danger mb-2">
              <input
                class="form-check-input input-filter"
                type="checkbox"
                id="select-personal"
                data-value="personal"
                checked />
              <label class="form-check-label" for="select-personal">Personal</label>
            </div>
            <div class="form-check mb-2">
              <input
                class="form-check-input input-filter"
                type="checkbox"
                id="select-business"
                data-value="business"
                checked />
              <label class="form-check-label" for="select-business">Business</label>
            </div>
            <div class="form-check form-check-warning mb-2">
              <input
                class="form-check-input input-filter"
                type="checkbox"
                id="select-family"
                data-value="family"
                checked />
              <label class="form-check-label" for="select-family">Family</label>
            </div>
            <div class="form-check form-check-success mb-2">
              <input
                class="form-check-input input-filter"
                type="checkbox"
                id="select-holiday"
                data-value="holiday"
                checked />
              <label class="form-check-label" for="select-holiday">Holiday</label>
            </div>
            <div class="form-check form-check-info">
              <input
                class="form-check-input input-filter"
                type="checkbox"
                id="select-etc"
                data-value="etc"
                checked />
              <label class="form-check-label" for="select-etc">ETC</label>
            </div>
          </div>
        </div>
      </div>
      <!-- /Calendar Sidebar -->

      <!-- Calendar & Modal -->
      <div class="col app-calendar-content" >
        <div class="card shadow-none border-0">
          <div class="card-body pb-0">
            <!-- FullCalendar -->
            <div id="calendar" ></div>
          </div>
        </div>
        <div class="app-overlay"></div>
        <!-- FullCalendar Offcanvas -->
        <div
          class="offcanvas offcanvas-end event-sidebar"
          tabindex="-1"
          id="addEventSidebar"
          aria-labelledby="addEventSidebarLabel">
          <div class="offcanvas-header my-1">
            <h5 class="offcanvas-title" id="addEventSidebarLabel">Add Event</h5>
            <button
              type="button"
              class="btn-close text-reset"
              data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>
          <div class="offcanvas-body pt-0">
            <form class="event-form pt-0" action="{{route('add.calendar')}}" method="post" id="eventForm" >
                @csrf
                <div class="mb-3">
                <label class="form-label" for="eventTitle">Event Title</label>
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    value="{{old('title')}}"
                    name="title"
                    placeholder="Event Title" />
                </div>

                <div class="mb-3">
                <label class="form-label" for="eventStartDate">Date</label>
                <input
                    type="date"
                    class="form-control "
                    {{-- id="date" --}}
                    value="{{old('date')}}"
                    placeholder="YYYY-MM-DD" id="flatpickr-date"
                    name="date"
                    placeholder="Start Date" />
                </div>

                <div class="mb-3">
                <label class="form-label" for="eventDescription">Description</label>
                <textarea class="form-control" name="description" id="description" value="{{old('date')}}"></textarea>
                </div>
                <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                <div>
                    <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">Add</button>
                    <button
                    type="reset"
                    class="btn btn-label-secondary btn-cancel me-sm-0 me-1"
                    data-bs-dismiss="offcanvas">
                    Cancel
                    </button>
                </div>
                <div><button class="btn btn-label-danger btn-delete-event d-none">Delete</button></div>
                </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /Calendar & Modal -->
    </div>
</div>


<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script>
@endsection


{{-- <div class="mb-3">
    <label class="switch">
      <input type="checkbox" class="switch-input allDay-switch" />
      <span class="switch-toggle-slider">
        <span class="switch-on"></span>
        <span class="switch-off"></span>
      </span>
      <span class="switch-label">All Day</span>
    </label>
  </div> --}}

