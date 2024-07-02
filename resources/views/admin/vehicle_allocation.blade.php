@extends('layouts.view')
@section('page-title')
Vehicle Allocations
@endsection
@section('card-header')
Assign Vehicles
@endsection
@section('body')

@if ($edit_allocation)

<form action="{{ route('update.v-allocation') }}" method="post">
    @csrf
    @method('patch')
    <input type="hidden" name="id" value="{{ $edit_allocation->id }}">
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-5 col-sm-12">
                <label for="">Vehicle</label>
                <select type="text" class="form-control select2" name="bus_id" id="bus_id" >
                    <option value="">- Select -</option>
                    @foreach ($vehicles as $row)
                    <option value="{{ $row->id }}" {{ $edit_allocation->bus_id == $row->id ? 'selected' : '' }}> {{ $row->name }} ({{ $row->plate_number }}) </option>
                    @endforeach
                </select>
                @error('bus_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-5 col-sm-12">
                <label for="">Route</label>
                <select type="text" class="form-control select2" name="route_id" id="route_id" >
                    <option value="">- Select -</option>
                    @foreach ($routes as $row)
                    <option value="{{ $row->id }}" {{ $edit_allocation->route_id == $row->id ? 'selected' : '' }}> {{ $row->name }} </option>
                    @endforeach
                </select>
                @error('route_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-2 col-sm-6">
                <button class="btn btn-success">Update</button>
            </div>
    </div>

</form>

@else

<form action="{{ route('create.v-allocation') }}" method="post">
    @csrf
    <div class="row align-items-end">

            @csrf
            <div class="col-lg-5 col-sm-12">
                <label for="">Vehicle</label>
                <select type="text" class="form-control select2" name="bus_id" id="bus_id" >
                    <option value="">- Select -</option>
                    @foreach ($vehicles as $row)
                    <option value="{{ $row->id }}"> {{ $row->name }} ({{ $row->plate_number }}) </option>
                    @endforeach
                </select>
                @error('vehicle_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-5 col-sm-12">
                <label for="">Route</label>
                <select type="text" class="form-control select2" name="route_id" id="route_id" >
                    <option value="">- Select -</option>
                    @foreach ($routes as $row)
                    <option value="{{ $row->id }}"> {{ $row->name }} </option>
                    @endforeach
                </select>
                @error('vehicle_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-2 col-sm-6">
                <button class="btn btn-success">Assign</button>
            </div>
    </div>

</form>
@endif

@endsection
@section('second-card')

<div class="card">
    <h5 class="card-header">Transportation Buses Allocations</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Bus</th>
            <th></th>
            <th>Route</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @forelse ($allocations as $row)
          <tr>
            <td>{{ ++$sn }}</td>
            <td>{{ $row->bus->name }}</td>
            <td>
                <span class="badge bg-info">Assigned to</span>
            </td>
            <td>{{ $row->route->name }}</td>
            <td>
                <form action="{{ route('delete.v-allocation') }}" method="post" >
                    @csrf
                    @method('delete')
                <div class="btn-group">
                    <input type="hidden" name="id" id="id" value="{{ $row->id }}">
                    <a class="btn btn-info btn-sm" href="{{ route('edit.v-allocation', $row->id) }}" ><i class="ti ti-edit"></i></a>
                    <button class="btn btn-danger btn-sm delete" type="button"><i class="ti ti-trash"></i></button>
                </div>
                </form>
            </td>
            @empty
            <td colspan="5" class="text-center">No allocations found</td>
            @endforelse
          </tr>
         
        </tbody>
      </table>
    </div>
</div>

@endsection
