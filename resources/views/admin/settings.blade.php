@extends('layouts.view')
@section('page-title')
Settings
@endsection
@section('card-header')
Settings
@endsection



@section('body')
<div class="row p-0">

    <div class="col-lg-4 col-md-4 col-sm-6 my-1">
        <div class="card">
        <div class="card-body">
            <div class="card-title row">
                <div class="col-9 text-sm">Add Payments Types</div> <div class="col-3"><i class="ti ti-cash"></i></div>
            </div>
            <div class="col-6 mt-3"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#addPaymentsTypes"><i class="fa fa-solid fa-plus" ></i></button></div>
            <div class="col-12 d-flex p-2">
                <span class="col-6 text-sm">Payment Types</span>
                <div class="col-6">
                    <select class="form-control form-select-sm" name="" id="">
                        <option value="">- Select -</option>
                    </select>
                </div>
            </div>
        </div>

        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 my-1">
        <div class="card">
        <div class="card-body">
            <div class="card-title row">
                <div class="col-9 text-sm">Staff Type Registration</div> <div class="col-3"></i></div>
            </div>
            <div class="col-6 mt-3"><button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#myModal1"><i class="fa fa-solid fa-plus" ></i></button></div>
            <div class="col-12 d-flex p-2">
                <span class="col-6 text-sm">Staff Types</span>
                <div class="col-6">
                    <select class="form-select form-control form-select-sm" name="" id="">
                        <option value="">- Select -</option>
                    </select>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 my-1">
        <div class="card ">
        <div class="card-body">
            <div class="card-title row">
                <div class="col-9 text-sm">Add New Class</div> <div class="col-3"></div>
            </div>
            <div class="col-6 mt-3">
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-solid fa-plus" ></i></button>
            </div>
            <div class="col-12 d-flex p-2">
                <span class="col-6 text-sm">Available classes</span>
                <div class="col-6">
                    <select class="form-control form-select-sm" name="" id="">
                        <option value="">- Select -</option>
                    </select>
                </div>
            </div>

        </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 my-2">
        <div class="card">
        <div class="card-body">
            <div class="card-title row">
                <div class="col-9 text-sm">Add New Session</div> <div class="col-3"></div>
            </div>
            <div class="col-6 mt-3">
                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalSession"><i class="fa fa-solid fa-plus" ></i></button>
            </div>
            <form action="" method="post">
                @csrf
                <div class="col-12 p-2 d-flex justify-content-between">
                    <span class="col-3 text-sm">Sessions</span>
                    <div class="col-6">
                        <select class="form-select form-select-sm form-control" name="session" id="">
                            <option value="">- Select -</option>
                            @foreach ($sessions as $session)
                            <option value="{{ $session->id }}">{{ $session->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-upload" ></i></button>
                    </div>
                </div>
            </form>

        </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 my-2">
        <div class="card">
        <div class="card-body">
            <div class="card-title row">
                <div class="col-9 text-sm">Terms</div> <div class="col-3"><i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i></div>
            </div>
            <div class="col-6 mt-3">
                <button class="btn btn-info btn-sm"><i class="fa fa-solid fa-plus" ></i></button>
            </div>
        <form action="" method="post">
            @csrf
            <div class="col-12 d-flex p-2">
                <span class="col-4 text-sm">Set Terms</span>
                <div class="col-8 d-flex justify-content-between">

                    <div class="col-6">
                        <select class="form-control form-select-sm" name="term" id="">
                            <option value="">- Terms -</option>
                            @foreach ($terms as $term)
                            <option value="{{ $term->id }}">{{ $term->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-info btn-sm" type=""><i class="fa fa-upload" ></i></button>
                    </div>

                </div>
            </div>
        </form>

        </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 my-2 pb-0">
        <div class="card ">
        <div class="card-body ">
            <div class="card-title row">
                <div class="col-9 text-sm">School Name And Logo</div> <div class="col-3"><i class="fa fa-school text-warning text-sm opacity-10" ></i></div>
            </div>
            <div class="col-12 d-flex justify-content-between mt-3">
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <button class="btn btn-info btn-sm" data-bs-target="#addSchool" data-bs-toggle="modal"><i class="fa fa-solid fa-plus" ></i></button>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <button class="btn btn-info btn-sm"><i class="fa fa-image" ></i></button>
                </div>
            </div>
            <form action="{{ route('activate.school') }}" method="post" class="">
                @csrf
                <div class="row mt-3">
                    <div class="col-3">
                        <button class="btn btn-info btn-sm" type=""><i class="fa fa-upload" ></i></button>
                    </div>
                    <div class="col-9">
                        <select class="form-control form-select form-select-sm select2" name="school" id="">
                            <option value="">School</option>
                            @foreach ($schools as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-6 my-2 pb-0">
        <div class="card  ">
        <div class="card-body ">
            <div class="card-title row">
                <div class="col-9 text-sm">Payable Fees And Amounts</div> <div class="col-3"></div>
            </div>
            <div class="col-12 d-flex justify-content-between mt-3">
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <button class="btn btn-info btn-sm" data-bs-target="#addPayments" data-bs-toggle="modal"><i class="ti ti-plus"></i></button>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3">
                    <button class="btn btn-info btn-sm"><i class="ti ti-cash" ></i></button>
                </div>
            </div>
                <div class="row mt-3">

                    <div class="col-12">
                        <select class="form-control form-select form-select-sm select2" name="school" id="">
                            <option value="">Payable Fees - Term - Session</option>
                        </select>
                    </div>
                </div>
        </div>
        </div>
    </div>

</div>





{{-- Modal for school settings --}}

<div class="modal fade" id="addSchool" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content  " >
        <div class="modal-body modalBody" id="modalBody">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
                <h3 class="mb-2">Add School & Info</h3>
            </div>
            <form action="{{ route('create.school') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-end">
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">School Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name">
                        @error('name')
                            <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Slogan</label>
                        <input type="text" class="form-control form-control-sm" name="slogan" id="slogan">
                        @error('slogan')
                            <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Abbreviation</label>
                        <input type="text" class="form-control form-control-sm" name="abbreviation" id="abbreviation">
                        @error('abbreviation')
                            <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Address</label>
                        <input type="text" class="form-control form-control-sm" name="address" id="address">
                        @error('address')
                            <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Phone</label>
                        <input type="text" class="form-control form-control-sm" name="phone" id="phone">
                        @error('phone')
                            <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control form-control-sm" name="email" id="email">
                        @error('email')
                            <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Logo</label>
                        <input type="file" class="form-control form-control-sm" name="logo" id="logo">
                        @error('logo')
                            <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-4 align-items-end mt-2">
                        <button class="btn btn-success btn-sm" type="submit">Save</button>
                    </div>
                </div>

            </form>
        </div>
      </div>
    </div>
</div>
{{-- Modal for school settings /--}}


{{-- Modal for payment fees update --}}
<div class="modal fade" id="addPayments" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content  p-md-5" >
        <div class="modal-body modalBody" id="modalBody">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
                <h3 class="mb-2">Add Payment and amounts</h3>
            </div>
            <form action="" method="post">
                @csrf
                <div class="row align-items-end">
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name">
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Amount</label>
                        <input type="number" class="form-control form-control-sm" name="amount" id="amount">
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Class</label>
                        <select class="form-select form-select-sm" name="class_id" id="class_id">
                            <option value="">-Select-</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Session</label>
                        <select class="form-select form-select-sm" name="session_id" id="session_id">
                            <option value="">-Select-</option>
                        </select>
                    </div>
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Term</label>
                        <select class="form-select form-select-sm   " name="term_id" id="term_id">
                            <option value="">-Select-</option>
                        </select>
                    </div>
                    <div class="col-4 align-items-end">
                        <button class="btn btn-success btn-sm ">Save</button>
                    </div>
                </div>

            </form>
        </div>
      </div>
    </div>
</div>
{{-- Modal for payment fees update /--}}


{{-- Modal for payment type --}}
<div class="modal fade" id="addPaymentsTypes" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content  p-md-5" >
        <div class="modal-body modalBody" id="modalBody">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="text-center mb-4">
                <h3 class="mb-2">Add Payment Type</h3>
            </div>
            <form action="" method="post">
                @csrf
                <div class="row align-items-end">
                    <div class="col-lg-6 col-xl-6 col-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control form-control-sm" name="name" id="name">
                    </div>
                    <div class="col-4 align-items-end">
                        <button class="btn btn-success btn-sm ">Save</button>
                    </div>
                </div>

            </form>
        </div>
      </div>
    </div>
</div>
{{-- Modal for payment type /--}}

@endsection
{{-- @endsection --}}
{{-- @section('second-card')

<div class="card">
    <h5 class="card-header">Header</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
          <tr>
            <td></td>
            <td></td>
            <td><span class="badge bg-label-success me-1">Active</span></td>
            <td>
                <div class="btn-group">
                    <button class="btn btn-danger btn-sm delete" type="button"><i class="ti ti-trash"></i></button>
                    <button class="btn btn-info btn-sm"><i class="ti ti-edit"></i></button>
                </div>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
</div> --}}

{{-- @endsection --}}



