@extends('layouts.view')
@section('page-title')
Transportation routes
@endsection
@section('card-header')
Transportation routes
@endsection
@section('body')

<div class="row">
        @role('admin')
        <div class="col-lg-5 col-sm-12">
            @if ($route == '')
            <form action="{{route('add.transport.route')}}" method="post">
                @csrf
                <div class="row align-items-end">

                        @csrf
                        <div class="col-lg-6 col-sm-12 mt-2">
                            <label for="">Route Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Route Name">
                            @error('name')
                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-2">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" name="amount" placeholder="amount">
                            @error('amount')
                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-2">
                            <label for="">Session</label>
                            <select type="number" class="form-select" name="session_id" >
                                <option value="">- Select -</option>
                                @foreach ($sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->name }}</option>
                                @endforeach
                            </select>
                            @error('session_id')
                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3 col-sm-6">
                            <button class="btn btn-success">Add</button>
                        </div>
                </div>

            </form>
            @else
            <form action="{{route('edit.transport.route')}}" method="post">
                @method('patch')
                @csrf
                <div class="row align-items-end">
                        @csrf
                        <input type="hidden" name="id" value="{{ $route->id }}">
                        <div class="col-lg-6 col-sm-12 mt-2">
                            <label for="">Route Name</label>
                            <input type="text" class="form-control" name="name" value="{{ $route->name }}" placeholder="Route Name">
                            @error('name')
                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-2">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" name="amount" value="{{ $route->amount }}" placeholder="amount">
                            @error('amount')
                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-6 col-sm-12 mt-2">
                            <label for="">Session</label>
                            <select type="number" class="form-select" name="session_id" >
                                <option value="">- Select -</option>
                                @foreach ($sessions as $session)
                                <option value="{{ $session->id }}" {{ $route->session_id == $session->id ? 'selected' : ' ' }} >{{ $session->name }}</option>
                                @endforeach
                            </select>
                            @error('session_id')
                            <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-3 col-sm-6">
                            <button class="btn btn-success">Update</button>
                        </div>
                </div>

            </form>
            @endif

        </div>

        <div class="col-1" style="border-left:1px solid rgb(84, 82, 82)"></div>
        @endrole

        <div class="col-lg-6 col-sm-12">
            <div class="table-responsive text-nowrap">
                <table class="table">
                <thead>
                    <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Session</th>
                    @can('modify transport')
                    <th>Action</th>
                    @endcan
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $sn=0; @endphp
                    @foreach ($routes as $route)
                    <tr>
                    <td>{{ ++$sn }}</td>
                    <td>{{ $route->name }}</td>
                    <td>{{ number_format($route->amount, 2) }}</td>
                    <td>{{ $route->session->name }}</td>

                    @can('modify transport')
                    <td>
                        <div class="btn-group">
                            <form action="{{route('delete.route')}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" id="id" value="{{ $route->id }}">
                            <button class="btn btn-danger btn-sm delete" type="button"><i class="ti ti-trash"></i></button>
                            </form>
                            <a class="btn btn-info btn-sm" href="{{ route('get.route', $route->id) }}"><i class="ti ti-edit"></i></a>
                        </div>
                    </td>
                    @endcan

                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
</div>

@endsection

