<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="javascript:void(0);" class="app-brand-link">
        {{-- {{ asset('dashboard/img/newLogo.jpg') }} --}}
        <img src="{{ asset($school->logo) }}" class="rounded-circle logo" width="60" height="60" alt="">
        <span class="app-brand-text demo menu-text fw-bold">SMS</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>

      <!-- Layouts -->
      @role('admin')
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-key"></i>
          <div >Roles & Permissions</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('permissions') }}" class="menu-link">
              <div >Permissions</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('roles') }}" class="menu-link">
              <div >Roles</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="{{route('assign.permission.view')}}" class="menu-link" >
              <div >Assign Permissions</div>
            </a>
          </li>

        </ul>
      </li>
      @endrole


      @role('guardian')
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div >Children</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('guardian.children') }}" class="menu-link" >
              <div >My Children</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="" class="menu-link" target="_blank">
              <div >......</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="" class="menu-link" target="_blank">
              <div ></div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-cash"></i>
          <div >My Payments</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('guardian.payments') }}" class="menu-link" >
              <div >Payments</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="" class="menu-link" >
              <div >.....</div>
            </a>
          </li>
        </ul>
      </li>

      @endrole



      <!-- Front Pages -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-bus-stop"></i>
          <div >Transportation</div>
        </a>
        <ul class="menu-sub">
            @role('admin')
          <li class="menu-item">
            <a href="{{ route('vehicles') }}" class="menu-link" >
              <div >Transportation Vehicles</div>
            </a>
          </li>
          @endrole
          <li class="menu-item">
            <a href="{{ route('transportation.route') }}" class="menu-link" >
              <div >Routes</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('vehicle.allocation') }}" class="menu-link" >
              <div >Allocate Bus</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{ route('pay.transport.index') }}" class="menu-link" >
              <div >Pay Student Transportaion</div>
            </a>
          </li>
        </ul>
      </li>

      <!-- Apps & Pages -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Academics &amp; Pages</span>
      </li>

      <li class="menu-item">
        <a href="{{route('calendar')}}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-calendar"></i>
          <div data-i18n="Calendar">Calendar</div>
        </a>
      </li>
    @role('admin')
      <!-- Academy menu start -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-book"></i>
          <div >Academics</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{route('release.result')}}" class="menu-link">
                  <div>Release Result</div>
                </a>
              </li>
          <li class="menu-item">
            <a href="{{route('student.result')}}" class="menu-link">
              <div>Results</div>
            </a>
          </li>


          <li class="menu-item">
            <a href="{{route('promotions')}}" class="menu-link">
              <div >Promote Students</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="" class="menu-link">
              <div >Demote Students</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('complaints')}}" class="menu-link">
              <div >Complaints</div>
            </a>
          </li>
          {{-- <li class="menu-item">
            <a href="" class="menu-link">
              <div >......</div>
            </a>
          </li> --}}
        </ul>
      </li>
      <!-- Academy menu end -->
    @endrole


    @role('admin|eo')
     <!-- Results menu start -->
     <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-file"></i>
          <div >Student Results</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{ route('uploaded.results.class') }}" class="menu-link">
                  <div>View Uploaded Grades</div>
                </a>
            </li>
            {{-- {{route('index.result')}} --}}
          <li class="menu-item">
            <a href="{{route('student.result')}}" class="menu-link">
              <div>Seacrh Result</div>
            </a>
          </li>


          <li class="menu-item">
            <a href="{{route('release.result')}}" class="menu-link">
              <div >Release Result</div>
            </a>
          </li>
        </ul>
    </li>
      <!-- Results menu ends -->
    @endrole


    @role('admin|eo|teacher')
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-school"></i>
          <div >Allocations(class)</div>
        </a>
        <ul class="menu-sub">
            @role('admin')
            <li class="menu-item">
                <a href="{{ route('class.allocations') }}" class="menu-link">
                  <div >Class Allocations</div>
                </a>
            </li>
            @endrole
            @role('teacher|eo')
            <li class="menu-item">
                <a href="{{ route('index.class.allocation') }}" class="menu-link">
                    <div >My Class Allocations</div>
                </a>
            </li>
            @endrole
        </ul>
      </li>
    @endrole

    @role('admin|eo|teacher')
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-books"></i>
          <div >Subjects</div>
        </a>
        <ul class="menu-sub">
            @role('admin')
            <li class="menu-item">
                <a href="{{ route('subject.allocations') }}" class="menu-link">
                  <div >Subject Allocations</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('subjects') }}" class="menu-link">
                  <div >Subjects</div>
                </a>
            </li>
            @endrole
            @role('eo|teacher')
            <li class="menu-item">
                <a href="{{route('allocated.subject')}}" class="menu-link">
                    <div >My Subject Allocations</div>
                </a>
            </li>
            @endrole
        </ul>
      </li>
    @endrole

    @role('teacher|eo')
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-book"></i>
          <div >Student Psycomotor</div>
        </a>

        <ul class="menu-sub">
          <li class="menu-item">
            <a href="" class="menu-link">
              <div >Add Performance</div>
            </a>
          </li>

        </ul>
      </li>
    @endrole

    {{-- ************************** TIME TABLES ******************* --}}
    @role('eo|admin|teacher')
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-calendar"></i>
          <div >Time Table</div>
        </a>

        <ul class="menu-sub">
            @can('alter_time_table')
          <li class="menu-item">
            <a href="{{ route('index.time.table') }}" class="menu-link">
              <div >Time table</div>
            </a>
          </li>
          @endcan
          {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
              <div >Staff Time Tables</div>
            </a>
          </li> --}}
        </ul>

    </li>
    @endrole
     {{-- ************************** TIME TABLES ENDS ******************* --}}


        {{-- ************************** GRADINGS TABLES ******************* --}}
    @role('eo|admin|teacher')
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-plus"></i>
          <div >Gradings</div>
        </a>

        <ul class="menu-sub">

          <li class="menu-item">
            <a href="{{ route('subject.grading') }}" class="menu-link">
              <div >Add Grades</div>
            </a>
          </li>
          {{-- <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link">
              <div >Staff Time Tables</div>
            </a>
          </li> --}}
        </ul>

    </li>
    @endrole
     {{-- ************************** GRADINGS ENDS ******************* --}}


     {{-- ************************** STUDENTS ******************* --}}
    @role('eo|admin')
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div >Students</div>
        </a>

        <ul class="menu-sub">
            @can('student list')
          <li class="menu-item">
            <a href="{{ route('student.list') }}" class="menu-link">
              <div >Students List</div>
            </a>
          </li>
            @endcan
            <li class="menu-item">
                <a href="{{ route('student.info')  }}" class="menu-link">
                    <div >Students Information</div>
                </a>
            </li>
            @can('add students')
          <li class="menu-item">
            <a href="{{route('add.student')}}" class="menu-link">
              <div >Register Student</div>
            </a>
          </li>
            @endcan
            @can('class student')
        <li class="menu-item">
            <a href="{{ route('student.list') }}" class="menu-link">
                <div >Class Students List</div>
            </a>
        </li>
            @endcan
          <li class="menu-item">
            <a href="" class="menu-link">
              <div >Bulk Uploads</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="" class="menu-link">
              <div ></div>
            </a>
          </li>
        </ul>

      </li>
    @endrole
     {{-- ************************** STUDENTS ENDS ******************* --}}


      {{-- ************************** STAFFS STATRS ******************* --}}
        @role('admin')
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div >Staffs</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('staff.list') }}" class="menu-link">
              <div >Staff List</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('add.staff')}}" class="menu-link">
              <div >Register Staff</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <div>Allocations</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('class.allocations') }}" class="menu-link">
                  <div >Allocate Class</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{ route('subject.allocations') }}" class="menu-link">
                  <div >Allocate Subjects</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="#" class="menu-link">
                  <div >Allocate Duties</div>
                </a>
              </li>

            </ul>
          </li>
        </ul>
      </li>
        @endrole
     {{-- ************************** STAFFFS ENDS  ******************* --}}

      {{-- ************************** FINANCES STARTS ******************* --}}
        @role('admin|accountant')
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-cash"></i>
          <div >Finances</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{route('payments')}}" class="menu-link">
              <div>Payments</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="{{route('make.payment')}}" class="menu-link">
              <div>Make Payment</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="{{route('fees')}}" class="menu-link">
              <div>Breakdown <i style="font-size:11px">(payments)</i></div>
            </a>
          </li>
        </ul>
      </li>
        @endrole
    {{-- ************************** FINANCES ENDS ******************* --}}

      <!-- Academic - Complaints and Chat  -->
      <li class="menu-item">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-school"></i>
          <div >Academic Matters</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('complaints') }}" class="menu-link">
              <div >Complaint</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link">
              <div >Chat</div>
            </a>
          </li>
        </ul>
      </li>
        <!-- Academic - Complaints and Chat / -->
      <!-- Application and Admissions -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Application & Admissions</span>
      </li>
      <!-- Forms -->
      <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-layout-navbar"></i>
          <div >Online Application </div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="{{ route('admission') }}" class="menu-link">
              <div >Admissions</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="form-layouts-horizontal.html" class="menu-link">
              <div >Time Table</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="form-layouts-sticky.html" class="menu-link">
              <div >......</div>
            </a>
          </li>
        </ul>
      </li>
        @role('admin')
      <li class="menu-item">
        <a
          href="{{ route('settings') }}"
          class="menu-link">
          <i class="menu-icon tf-icons ti ti-file-description"></i>
          <div >Settings</div>
        </a>
      </li>
        @endrole
    </ul>
</aside>
<!-- / Menu -->
