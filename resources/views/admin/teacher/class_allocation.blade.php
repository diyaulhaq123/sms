@extends('layouts.view')
@section('page-title')
Class Allocation
@endsection
@section('card-header')
Class Allocation
@endsection
@section('body')

<p>Class Allocation for current session</p>
<div class="row">
    @if($class_allocation)

    <div class="col-md-5 col-xl-5 col-sm-12">
        <div class="card bg-success text-white mb-3">
            <div class="card-header">
                {{$class_allocation->session->name}}
                <a href="{{ route('index.performance', ['class_id' => $class_allocation->class_id, 'wing'=>$class_allocation->wing]) }}"
                    class="btn btn-primary" style="float: right">Add Performance <i class="ti ti-plus"></i></a>
            </div>
            <div class="card-body">
              <h5 class="card-title text-white">You where assigned to: <strong>{{$class_allocation->class->name}}</strong></h5>
              <div class="card-text">Session: {{$class_allocation->session->name}}</div>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-6 col-xl-6 col-sm-12">
        <div class="card bg-danger text-white mb-3">
          <div class="card-header">Allocations - for {{$current_session->name}}</div>
          <div class="card-body">
            <h5 class="card-title text-white">You currently have no class allocation for the session</h5>
            <div class="card-text">Subject: **** </div>
            <div class="card-text">Class: **** </div>
          </div>
        </div>
    </div>
    @endif

</div>

@endsection
