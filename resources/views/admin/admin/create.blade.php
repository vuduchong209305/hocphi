@extends('admin.layout')
@section('title', 'Thêm mới')
@section('content')

<div class="card">

    <form class="card-body" action="{{ route('admin.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        @if(request('id')) 
            @method('PUT')
            <input type="hidden" name="id" value="{{ request('id') }}">
        @endif

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label" for="email">Email</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="ti ti-mail"></i>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" autofocus="" value="{{ !empty($user->email) ? $user->email : old('email') }}">
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="fullname">Full Name</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="ti ti-user-heart"></i>
                    </span>
                    <input type="text" class="form-control" name="fullname" placeholder="Họ tên" autofocus="" value="{{ !empty($user->fullname) ? $user->fullname : old('fullname') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-password-toggle">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="ti ti-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" {{ !request('id') ? 'required' : null }}/>
                        <span class="input-group-text cursor-pointer">
                            <i class="ti ti-eye-off"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-password-toggle">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="ti ti-lock"></i>
                        </span>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" {{ !request('id') ? 'required' : null }}/>
                        <span class="input-group-text cursor-pointer">
                            <i class="ti ti-eye-off"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="phone">Phone</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="ti ti-phone"></i>
                    </span>
                    <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" autofocus="" value="{{ !empty($user->phone) ? $user->phone : old('phone') }}">
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="passport">Căn cước / Hộ chiếu</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="ti ti-e-passport"></i>
                    </span>
                    <input type="text" class="form-control" name="passport" placeholder="Căn cước / Hộ chiếu" autofocus="" value="{{ !empty($user->passport) ? $user->passport : old('passport') }}">
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="birthday">Birthday</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="ti ti-calendar"></i>
                    </span>
                    <input type="text" class="form-control flatpickr" name="birthday" placeholder="Năm sinh" autofocus="" value="{{ !empty($user->birthday) ? $user->birthday : old('birthday') }}">
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="address">Address</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="ti ti-map-pins"></i>
                    </span>
                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ" autofocus="" value="{{ !empty($user->address) ? $user->address : old('address') }}">
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="role_id">Phân quyền</label>
                <select id="role_id" name="role_id" class="select2 form-select" data-allow-clear="true">
                    <option value="">Select</option>
                    @if(!empty($role))
                        @foreach($role as $val)
                            <option value="{{ $val->id }}" {{ !empty($user->role_id) && $val->id == $user->role_id ? 'selected' : null }} {{ old('role_id') == $val->id ? 'selected' : null }}>{{ $val->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Avatar</label>
                {{ vdh_upload_ckfinder(!empty($user->avatar) ? $user->avatar : old('avatar')) }}
            </div>
            <div class="col-md-6">
                {{ vdh_input_status(!empty($user->status) ? $user->status : old('status')) }}
            </div>
        </div>
        {{ vdh_button_form() }}
    </form>

</div>
@endsection