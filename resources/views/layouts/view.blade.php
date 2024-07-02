@php
$school = app(App\Http\Controllers\SchoolController::class)->getSchool();
@endphp
@include('layouts.dashboards.header')
@include('layouts.dashboards.sidebar')
@include('layouts.dashboards.body')
@include('layouts.dashboards.footer')
