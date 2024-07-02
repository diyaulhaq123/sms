@extends('layouts.view')
@section('page-title')
Fee Structures
@endsection
@section('card-header')
Payment for all Classes
@endsection
@section('body')
<div class="row">
    <div class="col-12 col-lg-6 mb-4 order-3 order-xl-0">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Filter Tuition Payment</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="performance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performance" style="">
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <form action="#" method="post">
                    @csrf
                    <div class="row align-items-end">
                            @csrf
                            <div class="col-lg-3 col-sm-12">
                                <label for=""> Class</label>
                                <select type="text" class="form-control form-select-sm" name="class_id" >
                                    <option value="">- Select -</option>
                                </select>
                                @error('class_id')
                                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <label for=""> Session</label>
                                <select type="text" class="form-control form-select-sm" name="session_id" >
                                    <option value="">- Select -</option>
                                </select>
                                @error('session_id')
                                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-sm-12">
                                <label for=""> Term</label>
                                <select type="text" class="form-control form-select-sm" name="term_id" >
                                    <option value="">- Select -</option>
                                </select>
                                @error('term_id')
                                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <button class="btn btn-success btn-sm">Search <i class="ti ti-filter"></i></button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 mb-4 order-3 order-xl-0">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Result For search</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="performance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performance" style="">
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            @php $sn=0 @endphp
                          <tr>
                            <th>SN</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Session</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $sn=0; @endphp
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><span class="badge bg-label-success me-1">Active</span></td>
                          </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 mb-4 order-3 order-xl-0">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Elementary Class<i style="font-size: 11px">(Nusery)</i></h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="performance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performance" style="">
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            @php $sn=0 @endphp
                          <tr>
                            <th>SN</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Session</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $sn=0; @endphp
                            @foreach ($elem as $row)
                          <tr>
                            <td>{{ ++$sn }}</td>
                            <td>{{ $row->class->name }}</td>
                            <td>{{ $row->term->name }}</td>
                            <td>{{ $row->session->name }}</td>
                            <td><span class="badge bg-label-success me-1">{{ number_format($row->amount) }}</span></td>
                          </tr>
                          @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 mb-4 order-3 order-xl-0">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Basic Classes Tuition Fees</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="performance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performance" style="">
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            @php $sn=0 @endphp
                          <tr>
                            <th>SN</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Session</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $sn=0; @endphp
                            @foreach ($basic as $row)
                            <tr>
                              <td>{{ ++$sn }}</td>
                              <td>{{ $row->class->name }}</td>
                              <td>{{ $row->term->name }}</td>
                              <td>{{ $row->session->name }}</td>
                              <td><span class="badge bg-label-success me-1">{{ number_format($row->amount) }}</span></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 mb-4 order-3 order-xl-0">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Junior Secondary Classes Tuition Fees</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="performance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performance" style="">
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            @php $sn=0 @endphp
                          <tr>
                            <th>SN</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Session</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $sn=0; @endphp
                            @foreach ($junior as $row)
                            <tr>
                              <td>{{ ++$sn }}</td>
                              <td>{{ $row->class->name }}</td>
                              <td>{{ $row->term->name }}</td>
                              <td>{{ $row->session->name }}</td>
                              <td><span class="badge bg-label-success me-1">{{ number_format($row->amount) }}</span></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 mb-4 order-3 order-xl-0">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">Senior Secondary Classes Tuition Fees</h5>
            <div class="dropdown">
                <button class="btn p-0" type="button" id="performance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ti ti-dots-vertical"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performance" style="">
                <a class="dropdown-item" href="javascript:void(0);">Download</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            @php $sn=0 @endphp
                          <tr>
                            <th>SN</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Session</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $sn=0; @endphp
                            @foreach ($senior as $row)
                            <tr>
                              <td>{{ ++$sn }}</td>
                              <td>{{ $row->class->name }}</td>
                              <td>{{ $row->term->name }}</td>
                              <td>{{ $row->session->name }}</td>
                              <td><span class="badge bg-label-success me-1">{{ number_format($row->amount) }}</span></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
