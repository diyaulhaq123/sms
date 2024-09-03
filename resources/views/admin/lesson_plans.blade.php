@extends('layouts.view')
@section('page-title')
Lesson Plans
@endsection
@section('card-header')
Uploaded lesson plans
@endsection
@section('body')

<div class="row">
    <div class="p-3">
        <table class="table">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Staff Name</th>
                    <th>Staff ID</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sn = 0;
                @endphp
                @forelse ($lesson_plans as $row)
                <tr>
                    <td>{{ ++$sn }}</td>
                    <td>{{ $row->subject->name  ?? '--'}}</td>
                    <td>{{ $row->class->name ?? '--'}}</td>
                    <td>{{ $row->staff->name ?? '--'}}</td>
                    <td>{{ $row->profile->staff_id ?? '--' }}</td>
                    <td>
                        <a href="{{ route('view.lesson_plan', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    </td>
                    @empty
                    <td class="text-center" colspan="6"><strong>No record found </strong></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
