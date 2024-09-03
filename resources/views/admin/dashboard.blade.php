@extends('layouts.view')
@section('page-title')
Dashboard
@endsection
@section('card-header')
Dashboard
@endsection
@section('body')
    <div class="row">

    {{-- ADMIN AND ACCOUNT/BURSARY FINAICIAL ANALYSIS VIEW --}}
    @role('admin|accountant')
        <div class="col-12 col-xl-12 ">
            <div class="row row-bordered g-0">
                <div class="col-md-12 position-relative p-4">
                <div class="card-header d-inline-block p-0 text-wrap position-relative">
                    <h6 class="m-0 card-title mb-2">School Report</h6>
                </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h6 class="mb-0">{{ $session->name }}</h6>
                            <small>Current session</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-chart-pie-2 ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h6 class="mb-0">{{ $term->name }}</h6>
                            <small>Current term</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-calendar ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h6 class="mb-0"><del>N</del>{{$term_payment}}</h6>
                            <small>Current term payments</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-credit-card ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h6 class="mb-0"><del>N</del>{{$session_payment}}</h6>
                            <small>Current Session payments</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-cash ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endrole
    {{-- ADMIN AND ACCOUNT/BURSARY FINAICIAL ANALYSIS VIEW ENDS --}}

    {{-- <!-- Dashboard cards for admin --> --}}
        <div class="row gy-3">
            @role('admin')


                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">{{ number_format($students) }}</h5>
                            <small>Students</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-users ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">{{ number_format($staffs) }}</h5>
                            <small>Staffs</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-users-group ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">{{ number_format($teachers) }}</h5>
                            <small>Teachers</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-users-group ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">{{ number_format($payments) }}</h5>
                            <small>Payments</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-cash ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">{{ number_format($subject_allocations) }}</h5>
                            <small>Subject Allocations</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-books ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h5 class="mb-0">{{ number_format($class_allocations) }}</h5>
                            <small>Class Allocations</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-school ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

            @endrole

            @role('admin|accountant')

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2" >1,000,000.00</h5>
                        <small>Salaries Disbursed</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-chart-pie-3 ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">5</h5>
                        <small>Outstanding</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-minus ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">10</h5>
                        <small>Total Payments</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-danger rounded-pill p-2">
                            <i class="ti ti-cash ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
            @endrole

            @role('teacher|eo')
                <div class="col-lg-4 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">86%</h5>
                        <small>Others</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-cpu ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">2</h5>
                        <small>Subject Allocation</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-cpu ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">1</h5>
                        <small>Class Allocation</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-danger rounded-pill p-2">
                            <i class="ti ti-chart-pie-2 ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
            @endrole

            @role('guardian')

                <div class="col-lg-4 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">{{ $my_children }}</h5>
                        <small>No Of children</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-users ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">{{ $total_payment_parent }}</h5>
                        <small>My Payments</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-danger rounded-pill p-2">
                            <i class="ti ti-chart-pie-2 ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 mb-4">
                    <div class="card h-100">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                        <h5 class="mb-0 me-2">2</h5>
                        <small>Others</small>
                        </div>
                        <div class="card-icon">
                        <span class="badge bg-label-primary rounded-pill p-2">
                            <i class="ti ti-cpu ti-sm"></i>
                        </span>
                        </div>
                    </div>
                    </div>
                </div>
            @endrole

        </div>

    {{-- <!--/ Dashboard cards admin ends --> --}}


     <div class="row">
        {{-- <!-- Academic Reports --> --}}
        @role('admin|eo')
        <div class="@role('admin') col-xl-6 col-md-6 @endrole @role('eo') col-xl-12 col-md-12 @endrole col-sm-12 mb-4" >
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Academic Reports</h5>
                    <small class="text-muted">Overall report</small>
                </div>
                </div>
                <div class="card-body pb-0">
                <ul class="p-0 m-0">

                    <li class="d-flex mb-3">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-primary"
                        ><i class="ti ti-chart-pie-2 ti-sm"></i
                        ></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <h6 class="mb-0">Registered Subjects</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-3">
                            <small class="">24</small>
                        </div>
                    </div>
                    </li>

                    <li class="d-flex mb-3">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-success"
                        ><i class="ti ti-file ti-sm"></i
                        ></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <h6 class="mb-0">Subject Allocations</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-3">
                        <small>10</small>
                        </div>
                    </div>
                    </li>
                    <li class="d-flex mb-3">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-secondary"
                        ><i class="ti ti-book ti-sm"></i
                        ></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <h6 class="mb-0">Class Allocations</h6>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-3">
                        <small>7</small>
                        </div>
                    </div>
                    </li>
                </ul>
                <div id="reportBarChart"></div>
                </div>
            </div>
        </div>
        @endrole
        {{-- <!--/ Academic Reports --> --}}


        {{-- <!-- Latest Payments --> --}}
        @role('admin|accountant')
        <div class="@role('admin') col-xl-6 col-md-6 @endrole @role('accountant') col-xl-12 col-md-12 @endrole col-sm-12 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                <div class="card-title m-0 me-2">
                    <h5 class="m-0 me-2">Latest Transactions/Payments</h5>
                    <small class="text-muted">Total 20 Transactions done this Session/Term</small>
                </div>
                <div class="dropdown">
                    <button
                    class="btn p-0"
                    type="button"
                    id="transactionID"
                    data-bs-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                <ul class="p-0 m-0">
                    @foreach ($latest_payments as $row)
                    <li class="d-flex mb-3 pb-1 align-items-center">
                    <div class="badge bg-label-info me-3 rounded p-2">
                        <i class="ti ti-currency-naira ti-sm"></i>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                        <h6 class="mb-0">{{ $row->payment_type->name ?? 'NA' }}</h6>
                        <small class="text-dark d-block mb-1">{{ $row->payment_status ?? ''}}</small>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                            <h6 class="mb-0 ">{{ $row->student->admission_no ?? ''}}</h6>
                        </div>
                        <div class="d-flex align-items-center gap-1">
                        <h6 class="mb-0 ">{{ number_format($row->paid, 2) }}</h6>
                        </div>
                    </div>
                    </li>
                    @endforeach
                </ul>
                </div>
            </div>
        </div>
        @endrole
        {{-- <!-- LATEST Payments --> --}}
     </div>



    @role('teacher')
    <!-- Academic Reports -->
    <div class="col-xl-12 col-md-12 mb-4" >
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Academic Reports</h5>
                    <small class="text-muted">Overall report</small>
                </div>
            </div>
            <div class="card-body pb-0">
                <ul class="p-0 m-0">
                    <li class="d-flex mb-3">
                        <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-primary"
                ><i class="ti ti-chart-pie-2 ti-sm"></i
                    ></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Registered Subjects</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-3">
                                <small class="">24</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-3">
                        <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-success"
                ><i class="ti ti-file ti-sm"></i
                    ></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Subject Allocations</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-3">
                                <small>10</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-3">
                        <div class="avatar flex-shrink-0 me-3">
                <span class="avatar-initial rounded bg-label-secondary"
                ><i class="ti ti-book ti-sm"></i
                    ></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Class Allocations</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-3">
                                <small>7</small>
                            </div>
                        </div>
                    </li>
                </ul>
                <div id="reportBarChart"></div>
            </div>
        </div>
    </div>
    <!--/ Academic Reports -->
    @endrole


</div>
@endsection

