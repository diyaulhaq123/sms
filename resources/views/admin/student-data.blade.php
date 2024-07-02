@extends('layouts.view')
@section('page-title')
Students
@endsection
@section('card-header')
Student Information
@endsection
@section('body')
<div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12">
        <!-- About User -->
        <div class="card mb-4">
        <div class="card-body">
            <small class="card-text text-uppercase">About</small>
            <div class="row justify-content-center">
                <div class="col-5 ">
                    <img src="{{ asset('dashboard/img/avatars/1.png') }}" alt="" width="100%" class="rounded-circle">
                </div>
            </div>
            <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-user text-heading"></i
                ><span class="fw-medium mx-2 text-heading">First Name:</span> <span> {{ $student->first_name }} </span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-user text-heading"></i
                ><span class="fw-medium mx-2 text-heading">Last Name:</span> <span> {{ $student->last_name }} </span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-check text-heading"></i
                ><span class="fw-medium mx-2 text-heading">Status:</span> <span class="badge bg-success">Active</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-crown text-heading"></i
                ><span class="fw-medium mx-2 text-heading">Role:</span> <span>Student</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-flag text-heading"></i
                ><span class="fw-medium mx-2 text-heading">State:</span> <span>{{ $student->state->name }}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-file-description text-heading"></i
                ><span class="fw-medium mx-2 text-heading">Lga:</span> <span>{{ $student->lga->name }}</span>
            </li>
            </ul>
            <small class="card-text text-uppercase">Guardian Contacts</small>
            <ul class="list-unstyled mb-4 mt-3">
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-phone-call"></i><span class="fw-medium mx-2 text-heading">Contact:</span>
                <span>{{ $student->guardian ? $student->guardian->phone : '' }}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-brand-skype"></i><span class="fw-medium mx-2 text-heading">Name:</span>
                <span>{{ $student->guardian ? $student->guardian->other_names.' '.$student->guardian->first_name : ''  }}</span>
            </li>
            <li class="d-flex align-items-center mb-3">
                <i class="ti ti-mail"></i><span class="fw-medium mx-2 text-heading">Email:</span>
                <span>{{ $student->user ? $student->user->email : '' }}</span>
            </li>
            </ul>
        </div>
        </div>
        <!--/ About User -->
    </div>
    <div class="col-xl-8  col-lg-7 col-md-7 col-sm-12">
        <h6 class="text-muted">Basic</h6>
        <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item">
            <button
                type="button"
                class="nav-link active"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-bio"
                aria-controls="navs-pills-top-bio"
                aria-selected="true">
                Biodata
            </button>
            </li>
            <li class="nav-item">
                <button
                    type="button"
                    class="nav-link"
                    role="tab"
                    data-bs-toggle="tab"
                    data-bs-target="#navs-pills-top-guardian"
                    aria-controls="navs-pills-top-guardian"
                    aria-selected="true">
                    Guardian
                </button>
                </li>
            <li class="nav-item">
            <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-payments"
                aria-controls="navs-pills-top-payments"
                aria-selected="false">
                Payments
            </button>
            </li>
            <li class="nav-item">
            <button
                type="button"
                class="nav-link"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-results"
                aria-controls="navs-pills-top-results"
                aria-selected="false">
                Exams/Results
            </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-top-bio" role="tabpanel">
            <p>
                Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps
                powder. Bear claw candy topping.
            </p>
            <p class="mb-0">
                Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon
                jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow
                jujubes sweet.
            </p>
            </div>

            <div class="tab-pane fade" id="navs-pills-top-guardian" role="tabpanel">
            <p>
                Guardian Tab
            </p>
            <p class="mb-0">
                Guardian Information
            </p>
            </div>

            <div class="tab-pane fade" id="navs-pills-top-payments" role="tabpanel">
            <p>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                      <thead>
                        @php $sn=0 @endphp
                        <tr>
                          <th>SN</th>
                          <th>Type</th>
                          <th>Session-Term</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><span class="badge bg-label-primary me-1">Status</span></td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="ti ti-pencil me-1"></i> Edit</a
                                >
                                <a class="dropdown-item delete" href="javascript:void(0);"
                                  ><i class="ti ti-trash me-1"></i> Delete</
                                >
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="ti ti-eye me-1"></i> View</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </p>
            <p class="mb-0">
                Above is the list of all possible payment under this current students record
            </p>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-results" role="tabpanel">
            <p>
                <div class="table-responsive text-nowrap">
                    <table class="table" >
                      <thead>
                        @php $sn=0 @endphp
                        <tr>
                          <th>SN</th>
                          <th>Class</th>
                          <th>Session-Term</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><span class="badge bg-label-primary me-1">Status</span></td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"
                                  ><i class="ti ti-pencil me-1"></i>View</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </p>
            <p class="mb-0">
                Above is the list of all result under this current students record
            </p>
            </div>
        </div>
        </div>
  </div>
</div>
@endsection


