<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>Menu Management</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span>Dashboard</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts1" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-group-line"></i> <span>Student</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts1">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Student List</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end student Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts1a" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-user-add-line"></i> <span>Application</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts1a">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Application List</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Admission List</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end student Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-shield-user-fill"></i> <span>Guardians/Parents</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts2">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Guardians List</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end guardians Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-group-fill"></i> <span>Staff</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">All Staffs</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Teachers</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Accountant</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Exams Officer</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Staffs Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-book-open-line"></i> <span>Library</span>
                    </a>
                </li> <!-- end library Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-book-read-line"></i> <span>Classes</span>
                    </a>
                </li> <!-- end classes Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-book-3-fill"></i> <span>Subject</span>
                    </a>
                </li> <!-- end subjects Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-timer-fill"></i> <span>Routine</span>
                    </a>
                </li> <!-- end routine Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-calendar-check-line"></i> <span>Attendance</span>
                    </a>
                </li> <!-- end attendance Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts4" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-booklet-fill"></i> <span>Exams</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">View Exams</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Scores</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end exams Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-calendar-check-line"></i> <span>Notice</span>
                    </a>
                </li> <!-- end notice Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-calendar-check-line"></i> <span>Transport</span>
                    </a>
                </li> <!-- end transport Menu -->


                <li class="menu-title"><i class="ri-settings-2-line"></i> <span>Settings</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages6" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="ri-lock-2-line"></i> <span>Roles And Permissions</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages6">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Roles</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">Permissions</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages5" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-settings-5-fill"></i> <span>Settings</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages5">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('portal_settings.index') }}" class="nav-link">Portal Settings</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">System Settings</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-question-fill"></i> <span>Support</span>
                    </a>
                </li> <!-- end notice Menu -->

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
