@extends('layouts.view')
@section('page-title')
Promotions & Demotions
@endsection
@section('body')

<div class="card">
    <h5 class="card-header">Promotions/Demotions</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>SN</th>
            <th>Class</th>
            <th>Current Session</th>
            <th>Promotions|Demotions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @php $sn=0; @endphp
            @forelse($classes as $row)
          <tr>
            <td>{{ ++$sn }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $session->name }}</td>
            <td>
                <div class="btn-group">
                    <a href="{{ route('view.promotion', $row->id) }}" class="btn btn-success btn-xs"><i class="ti ti-arrow-up"></i></a>
                    <a href="{{route('view.demotion', $row->id)}}" class="btn btn-danger btn-xs"><i class="ti ti-arrow-down"></i></a>
                </div>
            </td>
            @empty
            <td colspan="4" class="text-center">No data found</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
</div>

@endsection
