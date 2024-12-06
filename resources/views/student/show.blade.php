@extends('layouts.master')
@section('title')
Student
@endsection
@section('content')

@component('components.breadcrumb')
@slot('li_1') Pages @endslot
@slot('title') Student Record  @endslot
@endcomponent


<div class="container-fluid" bis_skin_checked="1">
    <div class="profile-foreground position-relative mx-n4 mt-n4" bis_skin_checked="1">
        <div class="profile-wid-bg" bis_skin_checked="1">
            <img src="build/assets/images/profile-bg.jpg" alt="" class="profile-wid-img">
        </div>
    </div>
    <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper" bis_skin_checked="1">
        <div class="row g-4" bis_skin_checked="1">
            <div class="col-auto" bis_skin_checked="1">
                <div class="avatar-lg" bis_skin_checked="1">
                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-thumbnail rounded-circle">
                </div>
            </div>
            <!--end col-->
            <div class="col" bis_skin_checked="1">
                <div class="p-2" bis_skin_checked="1">
                    <h3 class="text-white mb-1">{{ $student->last_name.' '.$student->first_name.' '.$student->other_name }}</h3>
                    <p class="text-white text-opacity-75">Student</p>
                    <div class="hstack text-white-50 gap-1" bis_skin_checked="1">
                        <div class="me-2" bis_skin_checked="1"><i class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>{{ $student->class_category->name ?? '' }}</div>
                        <div bis_skin_checked="1">
                            <i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>{{ $student->class->name ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-12 col-lg-auto order-last order-lg-0" bis_skin_checked="1">
                <div class="row text text-white-50 text-center" bis_skin_checked="1">
                    <div class="col-lg-6 col-4" bis_skin_checked="1">
                        <div class="p-2" bis_skin_checked="1">
                            <h4 class="text-white mb-1">{{ $student->studentSessions($student->id) }}</h4>
                            <p class="fs-14 mb-0">Sessions</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->

        </div>
        <!--end row-->
    </div>

    <div class="row" bis_skin_checked="1">
        <div class="col-lg-12" bis_skin_checked="1">
            <div bis_skin_checked="1">
                <div class="d-flex profile-wrapper" bis_skin_checked="1">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab" role="tab" aria-selected="true">
                                <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Overview</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Projects/Grades</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab" aria-selected="false" tabindex="-1">
                                <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span class="d-none d-md-inline-block">Documents</span>
                            </a>
                        </li>
                    </ul>
                    <div class="flex-shrink-0" bis_skin_checked="1">
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                    </div>
                </div>
                <!-- Tab panes -->
                <div class="tab-content pt-4 text-muted" bis_skin_checked="1">
                    <div class="tab-pane active show" id="overview-tab" role="tabpanel" bis_skin_checked="1">
                        <div class="row" bis_skin_checked="1">
                            <div class="col-xxl-12" bis_skin_checked="1">
                                <div class="card" bis_skin_checked="1">
                                    <div class="card-body" bis_skin_checked="1">

                                        <h5 class="card-title mb-3">About</h5>

                                        <div class="row" bis_skin_checked="1">
                                            <div class="col-6 col-md-4" bis_skin_checked="1">
                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3" bis_skin_checked="1">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary" bis_skin_checked="1">
                                                            <i class="ri-user-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden" bis_skin_checked="1">
                                                        <p class="mb-1">Name (Last - First - Middle/Other) :</p>
                                                        <h6 class="text-truncate mb-0">{{ $student->last_name.' '.$student->first_name.' '.$student->other_name }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-6 col-md-4" bis_skin_checked="1">
                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3" bis_skin_checked="1">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary" bis_skin_checked="1">
                                                            <i class="ri-graduation-cap-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden" bis_skin_checked="1">
                                                        <p class="mb-1">Admission No :</p>
                                                        <h6 class="text-truncate mb-0">{{ $student->admission_no }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->


                                            <div class="col-6 col-md-4" bis_skin_checked="1">
                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3" bis_skin_checked="1">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary" bis_skin_checked="1">
                                                            <i class="ri-user-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden" bis_skin_checked="1">
                                                        <p class="mb-1">Guardian Name :</p>
                                                        <h6>{{ $student->guardian->name ?? '' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-6 col-md-4" bis_skin_checked="1">
                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3" bis_skin_checked="1">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary" bis_skin_checked="1">
                                                            <i class="ri-book-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden" bis_skin_checked="1">
                                                        <p class="mb-1">Student Class :</p>
                                                        <h6>{{ $student->class->name ?? '' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-6 col-md-4" bis_skin_checked="1">
                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3" bis_skin_checked="1">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary" bis_skin_checked="1">
                                                            <i class="ri-book-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden" bis_skin_checked="1">
                                                        <p class="mb-1">Student Class Wing :</p>
                                                        <h6>{{ $student->wing ?? '' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-6 col-md-4" bis_skin_checked="1">
                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3" bis_skin_checked="1">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary" bis_skin_checked="1">
                                                            <i class="ri-flag-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden" bis_skin_checked="1">
                                                        <p class="mb-1">State :</p>
                                                        <h6>{{ $student->state->name ?? '' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-6 col-md-4" bis_skin_checked="1">
                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3" bis_skin_checked="1">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary" bis_skin_checked="1">
                                                            <i class="ri-map-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden" bis_skin_checked="1">
                                                        <p class="mb-1">Local Government :</p>
                                                        <h6>{{ $student->lga->name ?? '' }}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-6 col-md-4" bis_skin_checked="1">
                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3" bis_skin_checked="1">
                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary" bis_skin_checked="1">
                                                            <i class="ri-home-2-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden" bis_skin_checked="1">
                                                        <p class="mb-1">Home Address :</p>
                                                        <i>{{ $student->address ?? '' }}</i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end card-body-->
                                </div><!-- end card -->

                                <div class="row" bis_skin_checked="1">
                                    <div class="col-lg-12" bis_skin_checked="1">
                                        <div class="card" bis_skin_checked="1">
                                            <div class="card-header align-items-center d-flex" bis_skin_checked="1">
                                                <h4 class="card-title mb-0  me-2">Recent Activity(Classes)</h4>
                                            </div>
                                            <div class="card-body" bis_skin_checked="1">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Class</th>
                                                                <th>Session</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($classes as $row)
                                                            <tr>
                                                                <td>#</td>
                                                                <td>{{ $row->class->name }}</td>
                                                                <td>{{ $row->session->name }}</td>
                                                            </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td>#</td>
                                                                <td>{{ $student->class->name }}</td>
                                                                <td>{{ $student->session->name }}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div><!-- end col -->
                                </div><!-- end row -->

                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="tab-pane fade" id="projects" role="tabpanel" bis_skin_checked="1">
                        <div class="card" bis_skin_checked="1">
                            <div class="card-body" bis_skin_checked="1">
                                <div class="row" bis_skin_checked="1">
                                    @foreach ($results as $result)
                                    <div class="col-xxl-3 col-sm-6" bis_skin_checked="1">
                                        <div class="card profile-project-card shadow-none profile-project-success" bis_skin_checked="1">
                                            <div class="card-body p-4" bis_skin_checked="1">
                                                <div class="d-flex" bis_skin_checked="1">
                                                    <div class="flex-grow-1 text-muted overflow-hidden" bis_skin_checked="1">
                                                        <h5 class="fs-14 text-truncate"><a href="#" class="text-body">{{$result->class->name ?? '' }}</a></h5>
                                                        <p class="text-muted text-truncate mb-0">{{$result->session->name ?? '' }} </p>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2" bis_skin_checked="1">
                                                        <div class="badge bg-primary-subtle text-primary fs-10" bis_skin_checked="1">Ready!</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-grow-1" bis_skin_checked="1">
                                                        <div class="d-flex align-items-center gap-2" bis_skin_checked="1">
                                                            <div bis_skin_checked="1">
                                                                <h5 class="fs-12 text-muted mb-0">{{$result->term->name ?? '' }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('get.result', [$student->id,$result->class_id,$result->session_id,$result->term_id]) }}" class="btn btn-primary btn-sm float-end">View Result <i class="ri-eye-fill"></i></a>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    @endforeach


                                    @if (!empty($result2))
                                    @foreach ($result2 as $result)
                                    <div class="col-xxl-3 col-sm-6" bis_skin_checked="1">
                                        <div class="card profile-project-card shadow-none profile-project-success" bis_skin_checked="1">
                                            <div class="card-body p-4" bis_skin_checked="1">
                                                <div class="d-flex" bis_skin_checked="1">
                                                    <div class="flex-grow-1 text-muted overflow-hidden" bis_skin_checked="1">
                                                        <h5 class="fs-14 text-truncate"><a href="#" class="text-body">{{$result->class->name ?? '' }}</a></h5>
                                                        <p class="text-muted text-truncate mb-0">{{$result->session->name ?? '' }} </p>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2" bis_skin_checked="1">
                                                        <div class="badge bg-primary-subtle text-primary fs-10" bis_skin_checked="1">Ready!</div>
                                                    </div>
                                                </div>

                                                <div class="d-flex mt-4" bis_skin_checked="1">
                                                    <div class="flex-grow-1" bis_skin_checked="1">
                                                        <div class="d-flex align-items-center gap-2" bis_skin_checked="1">
                                                            <div bis_skin_checked="1">
                                                                <h5 class="fs-12 text-muted mb-0">{{$result->term->name ?? '' }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('get.result', [$student->id,$result->class_id,$result->session_id,$result->term_id]) }}" class="btn btn-primary btn-sm float-end">View Result <i class="ri-eye-fill"></i></a>
                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->
                                    </div>
                                    <!--end col-->
                                    @endforeach
                                    @endif

                                    <div class="col-lg-12" bis_skin_checked="1">
                                        <div class="mt-4" bis_skin_checked="1">
                                            <ul class="pagination pagination-separated justify-content-center mb-0">
                                                <li class="page-item disabled">
                                                    <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="javascript:void(0);" class="page-link">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link">4</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link">5</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="javascript:void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane fade" id="documents" role="tabpanel" bis_skin_checked="1">
                        <div class="card" bis_skin_checked="1">
                            <div class="card-body" bis_skin_checked="1">
                                <div class="d-flex align-items-center mb-4" bis_skin_checked="1">
                                    <h5 class="card-title flex-grow-1 mb-0">Documents</h5>
                                    <div class="flex-shrink-0" bis_skin_checked="1">
                                        <input class="form-control d-none" type="file" id="formFile">
                                        <label for="formFile" class="btn btn-danger"><i class="ri-upload-2-fill me-1 align-bottom"></i> Upload File</label>
                                    </div>
                                </div>
                                <div class="row" bis_skin_checked="1">
                                    <div class="col-lg-12" bis_skin_checked="1">
                                        <div class="table-responsive" bis_skin_checked="1">
                                            <table class="table table-borderless align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">File Name</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Upload Date</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                                <div class="avatar-sm" bis_skin_checked="1">
                                                                    <div class="avatar-title bg-primary-subtle text-primary rounded fs-20" bis_skin_checked="1">
                                                                        <i class="ri-file-zip-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1" bis_skin_checked="1">
                                                                    <h6 class="fs-15 mb-0"><a href="javascript:void(0)">Artboard-documents.zip</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Zip File</td>
                                                        <td>4.57 MB</td>
                                                        <td>12 Dec 2021</td>
                                                        <td>
                                                            <div class="dropdown" bis_skin_checked="1">
                                                                <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink15" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                                <div class="avatar-sm" bis_skin_checked="1">
                                                                    <div class="avatar-title bg-danger-subtle text-danger rounded fs-20" bis_skin_checked="1">
                                                                        <i class="ri-file-pdf-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1" bis_skin_checked="1">
                                                                    <h6 class="fs-15 mb-0"><a href="javascript:void(0);">Bank Management System</a></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>PDF File</td>
                                                        <td>8.89 MB</td>
                                                        <td>24 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown" bis_skin_checked="1">
                                                                <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink3" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink3">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                                <div class="avatar-sm" bis_skin_checked="1">
                                                                    <div class="avatar-title bg-secondary-subtle text-secondary rounded fs-20" bis_skin_checked="1">
                                                                        <i class="ri-video-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1" bis_skin_checked="1">
                                                                    <h6 class="fs-15 mb-0"><a href="javascript:void(0);">Tour-video.mp4</a></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>MP4 File</td>
                                                        <td>14.62 MB</td>
                                                        <td>19 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown" bis_skin_checked="1">
                                                                <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink4" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink4">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                                <div class="avatar-sm" bis_skin_checked="1">
                                                                    <div class="avatar-title bg-success-subtle text-success rounded fs-20" bis_skin_checked="1">
                                                                        <i class="ri-file-excel-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1" bis_skin_checked="1">
                                                                    <h6 class="fs-15 mb-0"><a href="javascript:void(0);">Account-statement.xsl</a></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>XSL File</td>
                                                        <td>2.38 KB</td>
                                                        <td>14 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown" bis_skin_checked="1">
                                                                <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink5" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink5">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                                <div class="avatar-sm" bis_skin_checked="1">
                                                                    <div class="avatar-title bg-info-subtle text-info rounded fs-20" bis_skin_checked="1">
                                                                        <i class="ri-folder-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1" bis_skin_checked="1">
                                                                    <h6 class="fs-15 mb-0"><a href="javascript:void(0);">Project Screenshots Collection</a></h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>Floder File</td>
                                                        <td>87.24 MB</td>
                                                        <td>08 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown" bis_skin_checked="1">
                                                                <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink6" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink6">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle"></i>View</a></li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle"></i>Download</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center" bis_skin_checked="1">
                                                                <div class="avatar-sm" bis_skin_checked="1">
                                                                    <div class="avatar-title bg-danger-subtle text-danger rounded fs-20" bis_skin_checked="1">
                                                                        <i class="ri-image-2-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1" bis_skin_checked="1">
                                                                    <h6 class="fs-15 mb-0">
                                                                        <a href="javascript:void(0);">Velzon-logo.png</a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>PNG File</td>
                                                        <td>879 KB</td>
                                                        <td>02 Nov 2021</td>
                                                        <td>
                                                            <div class="dropdown" bis_skin_checked="1">
                                                                <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink7" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink7">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle"></i>Download</a></li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-center mt-3" bis_skin_checked="1">
                                            <a href="javascript:void(0);" class="text-success"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

</div>


@endsection


{{-- @section('css')

@endsection --}}

@section('script')

    <script src="{{ URL::asset('build/js/app.js') }}"></script>

@endsection
