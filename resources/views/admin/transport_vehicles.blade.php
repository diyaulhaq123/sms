@extends('layouts.view')
@section('page-title')
Vehicles
@endsection
@section('card-header')
Transportation Vehicles
@endsection
@section('body')
<div class="row align-items-end">
    <div class="card">
        <div class="card-header ms-auto">
            <button type="button" class="btn btn-label-success waves-effect" data-bs-toggle="modal" data-bs-target="#modalTop" >Add New Bus <i class="fa fa-plus ms-2"></i></button>
        </div>
        <div class="card-body">
            <div class="row">
                @if($vehicle)

                <div class="col-md-6 col-xl-4">
                    <a href="javacript:void(0)">
                        <div class="card mb-3 text-dark">
                        <img class="card-img-top" src="{{ $vehicle->image ? $vehicle->image : "dashboard/img/bus2.jpg" }}" alt="Card image cap" width="200px" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Name: {{ $vehicle->name }}</h5>
                            <p class="card-text">Plate Number: {{ $vehicle->plate_number }}</p>
                            <div class="card-text row justify-content-between">
                                <div class="col-8">Year of use: {{ $vehicle->date_of_use }}</div>
                                <div class="col">
                                    <button class="btn btn-danger ms-auto delete" type="button"><i class="fa fa-trash"></i></button>
                                </div>
                            </div>
                            <div>Seat Number: <span class="badge bg-info">{{ $vehicle->seat_number }}</span></div>
                        </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-lg-6 col-sm-12">
                    <form action="{{ route('edit.vehicle') }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="{{ $vehicle->id }}">
                            <div class="col-6 col-sm-12 my-2">
                                <label for="">Name</label>
                                <input type="text" class="form-control form-control-sm" name="name" value="{{ $vehicle->name }}">
                            </div>
                            <div class="col-6 col-sm-12 my-2">
                                <label for="">Image</label>
                                <input type="file" class="form-control form-control-sm" name="image" >
                            </div>
                            <div class="col-6 col-sm-12 my-2">
                                <label for="">Plate Number</label>
                                <input type="text" class="form-control form-control-sm" name="plate_number" value="{{ $vehicle->plate_number }}">
                            </div>
                            <div class="col-6 col-sm-12 my-2">
                                <label for="">Seat Number</label>
                                <input type="number" class="form-control form-control-sm" name="seat_number" value="{{ $vehicle->seat_number }}">
                            </div>
                            <div class="col-6 col-sm-12 my-2">
                                <label for="">Date Of First Use</label>
                                <input type="date" id="date_of_use" class="form-control form-control-sm" name="date_of_use" value="{{ $vehicle->date_of_use }}">
                            </div>
                            <div class="col-6 mt-2">
                                <button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>

                @elseif($vehicle == '')
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-12 ">
                        <div class="alert alert-info text-center">No Bus found</div>
                    </div>
                </div>
                @else
                @forelse ($vehicles as $vehicle)

                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('find.vehicle', $vehicle->id) }}">
                        <div class="card mb-3 text-dark">
                        <img class="card-img-top" src="{{ $vehicle->image ? $vehicle->image : 'dashboard/img/bus2.jpg' }}" alt="Card image cap" width="200px" height="200px">
                        <div class="card-body">
                            <h5 class="card-title">Name: {{ $vehicle->name }}</h5>
                            <p class="card-text">Plate Number: {{ $vehicle->plate_number }}</p>
                            <div class="card-text row justify-content-between">
                                <div class="col-8">Year of use: {{ $vehicle->date_of_use }}</div>
                                <div class="col">
                                    <form action="{{ route('delete.vehicle', $vehicle->id) }}" method="post">@csrf @method('delete')
                                        <input type="hidden" value="{{ $vehicle->id }}" name="id">
                                        <button class="btn btn-danger ms-auto delete" type="button"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="">
                                Seat Number: <span class="badge bg-info">{{ $vehicle->seat_number }}</span>
                            </div>
                        </div>
                        </div>
                    </a>
                </div>

                @empty
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-12 ">
                        <div class="alert alert-info text-center">No Buses Available</div>
                    </div>
                </div>
                @endforelse
                @endif
            </div>
        </div>
    </div>
</div>



<div class="modal modal-top fade" id="modalTop" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
    <div class="modal-dialog">
      <form class="modal-content" action="{{ route('create.vehicle') }}" method="post">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="modalTopTitle">Add New Bus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <label for="nameSlideTop" class="form-label">Name</label>
              <input type="text" id="name" class="form-control" name="name">
            </div>
            <div class="col mb-3">
                <label for="nameSlideTop" class="form-label">Seat Number</label>
                <input type="number" id="seat_number" class="form-control" name="seat_number">
              </div>
          </div>
          <div class="row g-2">
            <div class="col mb-0">
              <label for="emailSlideTop" class="form-label">Plate Number</label>
              <input type="text" id="plate_number" name="plate_number" class="form-control" placeholder="Plate Number">
            </div>
            <div class="col mb-0">
              <label for="dobSlideTop" class="form-label">Date Of First Use</label>
              <input type="date" id="dobSlideTop" class="form-control" name="date_of_use">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
        </div>
      </form>
    </div>
  </div>

@endsection
