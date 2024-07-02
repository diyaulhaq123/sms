@extends('layouts.view')
@section('page-title')
Revoke Permission
@endsection
@section('card-header')
Revoke Permissions
@endsection

@section('body')

<div class="card-title">Revoke Permissions</div>
<form action="{{route('revoke.permission')}}" method="post">
    @csrf
    <div class="row justify-content-between">
        <div class="col-lg-4 col-sm-12">
            <label for="">Roles</label>
            <select class="select2 form-select" name="role">
                <option value="">- Select -</option>
                @foreach ($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-7 col-sm-12">
            <div class="row">
             <label for="">Permissions</label>
             @foreach ($permissions as $permission)
             <div class="form-check col-4 mt-2">
                <input class="form-check-input" type="checkbox" value="{{ $permission->name }}" id="" name="permission[]">
                <label class="form-check-label" for="defaultCheck3">
                    {{ $permission->name }}
                </label>
              </div>
              @endforeach
            </div>

        </div>
        <div class="col-lg-4 col-sm-6 mt-2">
            <button class="btn btn-danger ">Revoke Permission</button>
        </div>
    </div>
</form>
@endsection
@section('second-card')
<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Role Name</th>
                  <th></th>
                  <th>Permission</th>
                  {{-- <th>Action</th> --}}
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                  @php $sn=0; @endphp
                <tr>
                  <td>1</td>
                  <td>Admin</td>
                  <td><i class="ti ti-arrow-right"></i></td>
                  <td>
                    <div class="row justify-content-between">
                            @foreach ($admin as $adm)
                            <div class="col-3 my-1 ">
                                <span class="badge bg-info ">{{ $adm->name }}</span>
                            </div>
                            @endforeach
                    </div>
                 </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Accountant</td>
                    <td><i class="ti ti-arrow-right"></td>
                    <td>
                    <div class="row justify-content-between">
                      @foreach ($account as $acc)
                      <div class="col-2 my-1 ">
                      <span class="badge bg-info">{{ $acc->name }}</span>
                      </div>
                      @endforeach
                    </div>
                   </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Teacher</td>
                    <td><i class="ti ti-arrow-right"></td>
                    <td>
                    <div class="row justify-content-between">
                      @foreach ($teacher as $teach)
                      <div class="col-2 my-1">
                      <span class="badge bg-info">{{ $teach->name }}</span>
                      </div>
                      @endforeach
                    </div>
                   </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Guardian</td>
                    <td><i class="ti ti-arrow-right"></td>
                    <td>
                      <div class="row justify-content-between">
                      @foreach ($guardians as $guardian)
                      <div class="col-2 my-1">
                      <span class="badge bg-info">{{ $guardian->name }}</span>
                     </div>
                     @endforeach
                      </div>
                   </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Exam Officer</td>
                    <td><i class="ti ti-arrow-right"></td>
                    <td>
                    <div class="row justify-content-between">
                      @foreach ($eos as $eo)
                      <div class="col-2 my-1">
                      <span class="badge bg-info">{{ $eo->name }}</span>
                      </div>
                      @endforeach
                    </div>
                   </td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
</div>
@endsection
