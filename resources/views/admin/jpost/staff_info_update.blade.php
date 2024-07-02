<div class="card p-5" id="">

    <hr>
    <form action="{{route('add.staff.biodata')}}" method="post">
        @csrf
        <div class="row">
            <input type="hidden" name="user_id" id="user_id" value="{{ $staff->id }}">
            <div class="col-md-4 my-1">
                <label for="">First Name</label>
                <input type="text" class="form-control form-control-sm" name="first_name" value="" placeholder="First Names" >
                @error('first_name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4 my-1">
                <label for="">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="last_name" value="" placeholder="Last Names" >
                @error('last_name')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4 my-1">
                <label for="">Phone</label>
                <input type="text" class="form-control form-control-sm" name="phone" value="{{ $staff->phone }}" placeholder="Phone Number">
                @error('phone')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4 my-1">
                <label for="">Email</label>
                <input type="text" class="form-control form-control-sm" name="email" value="{{ $staff->email }}" placeholder="Email" >
                @error('email')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4 my-1">
                <label for="">Staff ID</label>
                <input type="text" class="form-control form-control-sm" readonly placeholder="Staff ID" value="{{ $staffId }}" >
                <input type="hidden" value="{{ $staffId }}" name="staff_id">
                @error('staff_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4 my-1">
                <label for="">Staff Type</label>
                <select type="select" class="form-select form-select-sm" name="staff_type_id" id="staff_type_id">
                    <option value="" selected="">- Select -</option>
                </select>
                @error('staff_type_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4 my-1">
                <label for="">State</label>
                <select type="select" class="form-select form-select-sm" name="state_id" id="state_id">
                    <option value="">- Select -</option>
                    @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                @error('state_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4 my-1">
                <label for="">LGA</label>
                <select type="select" class="form-select form-select-sm" name="lga_id" id="lga_id">
                    <option value="">Select Lga</option>
                </select>
                @error('lga_id')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-4 my-1">
                <label for="">Address</label>
                <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                @error('adress')
                <span class="text-danger" style="font-size:13px">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-3">
                <button type="submit" class="btn btn-success">Save</button>
            </div>

        </div>


    </form>
    <hr>
</div>

<script>
    $('#state_id').change(function(){
        var id = $('#state_id').val();
        var token = '{{ csrf_token() }}';
        $.post('{{ route('get.lga') }}', { id: id, _token: token }, function (data) {
            $('#lga_id').html(data);
        });
    });

</script>
