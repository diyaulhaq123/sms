@extends('layouts.view')
@section('page-title')
Profile
@endsection

@section('second-card')

<div class="row g-4">
    <div class="col-xl-4 col-lg-4 col-md-4">
      <div class="card">
        <div class="card-body text-center">
          <div class="mx-auto my-3">
            <img src="{{ auth()->user()->staff ? auth()->user()->staff->avatar : 'dashboard/img/avatars/3.png' }}" alt="Avatar Image" class="rounded-circle w-px-100">
          </div>
          <h4 class="mb-1 card-title">{{ auth()->user()->name }}</h4>
          <span class="pb-1">{{ auth()->user()->email }}</span>
          <div class="d-flex align-items-center justify-content-center my-3 gap-2">
            <a href="javascript:;" class="me-1"><span class="badge bg-label-info text-uppercase">{{ auth()->user()->type }}</span></a>
            {{-- <a href="javascript:;"><span class="badge bg-label-warning">Sketch</span></a> --}}
          </div>

          <div class="d-flex align-items-center justify-content-around my-3 py-1">
            <form action="{{ route('upload.avatar') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
            <div class="input-group input-group-sm">
                <input type="file" class="form-control form-control-sm" name="avatar" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-primary waves-effect" type="submit" id="inputGroupFileAddon04">Save</button>
            </div>
            </form>
          </div>
          <div class="d-flex align-items-center justify-content-center">
            {!!  auth()->user()->status == 1 ? '<a href="javascript:void(0);" class="btn btn-success btn-sm d-flex align-items-center me-3"><i class="ti-xs me-1 ti ti-user-check me-1"></i>Active </a>' :
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm d-flex align-items-center me-3"><i class="ti-xs me-1 ti ti-user-x me-1"></i>In-active </a>'
            !!}
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-8 col-lg-8 col-md-8">
      <div class="card">
        <div class="card-body p-3">
            <div class="nav-align-left p-3">
                <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-left-biodata" aria-controls="navs-left-biodata" aria-selected="true">
                    Biodata
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-left-password" aria-controls="navs-left-password" aria-selected="false" tabindex="-1">
                    Change Password
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-left-messages" aria-controls="navs-left-messages" aria-selected="false" tabindex="-1">
                    Messages
                    </button>
                </li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane fade show active p-2" id="navs-left-biodata" role="tabpanel">
                    @role('admin')
                    <div class="row">
                        <div class="col-6 my-2">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control form-control-sm" value="" name="last_name" >
                        </div>
                        <div class="col-6 my-2">
                            <label for="">First Name</label>
                            <input type="text" class="form-control form-control-sm" value="" name="first_name" >
                        </div>
                        <div class="col-6 my-2">
                            <label for="">Email</label>
                            <input type="text" class="form-control form-control-sm" value="" name="email" >
                        </div>
                        <div class="col-6 my-2">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control form-control-sm" value="" name="phone_number" >
                        </div>
                        <div class="col-4 my-2">
                            <button class="btn btn-info btn-sm">Save</button>
                        </div>

                    </div>
                    @endrole
                    @can('staff profile')
                    <form action="#" method="post">
                        @csrf
                        <input type="hidden" name="id" value="">

                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="first_name" type="text" class="form-control form-control-sm" id="first_name" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="last_name" type="text" class="form-control form-control-sm" id="last_name" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">State</label>
                            <div class="col-md-8 col-lg-9">
                                <select name="state_id" type="select" class="form-control form-select form-select-sm select2" id="state_id">
                                    <option value="">-Select-</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="phone" type="text" class="form-control form-control-sm" id="Phone" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                            <div class="col-md-8 col-lg-9">
                                <input name="email" type="email" class="form-control form-control-sm" id="Email" value="">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea name="address" type="text" class="form-control" id="Address">
                                </textarea>
                            </div>
                            </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary ">Save</button>
                        </div>
                    </form>
                    @endcan
                </div>
                <div class="tab-pane fade" id="navs-left-password" role="tabpanel">

                </div>
                <div class="tab-pane fade" id="navs-left-messages" role="tabpanel">
                    <p>
                    Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies
                    cupcake gummi bears cake chocolate.
                    </p>
                    <p class="mb-0">
                    Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet
                    roll icing sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly
                    jelly-o tart brownie jelly.
                    </p>
                </div>
                </div>
            </div>
        </div>
      </div>
    </div>

</div>


  @endsection
