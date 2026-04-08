@extends('admin.layout')
@section('title', 'Danh sách')
@section('content')

<div class="card">

    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            @if(request('id')) 
                @method('PUT')
                <input type="hidden" name="id" value="{{ request('id') }}">
            @endif

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label" for="avatar">Avatar</label>
                    {{ vdh_upload_avatar(!empty($user->avatar) ? $user->avatar : old('avatar')) }}
                </div>
                
                <div class="col-md-6">
                    {{ vdh_input_status(!empty($user->status) ? $user->status : old('status')) }}
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="email">Email <span class="text-danger">(*)</span>
                        @if(!empty($user->verified_at))
                        <span class="text-success">(✅ Đã xác minh {{ $user->verified_at }})</span>
                        @endif
                    </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email (*)" autofocus="" required value="{{ !empty($user->email) ? $user->email : old('email') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="fullname">Họ & tên <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ & tên (*)" autofocus="" required value="{{ !empty($user->fullname) ? $user->fullname : old('fullname') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="phone">Số điện thoại <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại (*)" autofocus="" required value="{{ !empty($user->phone) ? $user->phone : old('phone') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="company">Doanh nghiệp <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Công ty (*)" autofocus="" required value="{{ !empty($user->company) ? $user->company : old('company') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="contact">Liên hệ (Zalo/Wechat/Viber)</label>
                    <input type="text" class="form-control" id="contact" name="contact" placeholder="Liên hệ (Zalo/Wechat/Viber)" autofocus="" value="{{ !empty($user->contact) ? $user->contact : old('contact') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="address">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ" autofocus="" value="{{ !empty($user->address) ? $user->address : old('address') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="website">Website</label>
                    <input type="text" class="form-control" id="website" name="website" placeholder="Website" autofocus="" value="{{ !empty($user->website) ? $user->website : old('website') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="position_id">Chức vụ</label>
                    <select name="position_id" id="position_id" class="form-select">
                        <option value="">Chọn chức vụ</option>
                        @foreach($positions as $position)
                        <option value="{{ $position->id ?? null }}" {{ !empty($user->position_id) && $user->position_id == $position->id ? 'selected' : null }}>{{ $position->detail->name ?? null }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label" for="booth">Gian hàng</label>
                    <input type="text" class="form-control" id="booth" name="booth" placeholder="Gian hàng" autofocus="" value="{{ !empty($user->booth) ? $user->booth : old('booth') }}">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Type <span class="text-danger">(*)</span></label>
                        <select name="type" class="form-control select2" required>
                            @if(!empty($user_type) && count($user_type) > 0)
                                @foreach($user_type as $type)
                                    <option value="{{ $type->id ?? null }}"  {{ !empty($user->type) && $user->type == $type->id ? 'selected' : null }}>{{ $type->name ?? null }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="code">Code</label>
                    <input type="text" class="form-control" id="code" placeholder="Code" disabled="" value="{{ !empty($user->code) ? $user->code : old('code') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="agency_id">Đại lý giới thiệu</label>
                    <select name="agency_id" id="agency_id" class="form-control select2">
                        <option value="">Select</option>
                        @foreach($agency as $a)
                        <option value="{{ $a->id ?? null }}" {{ !empty($user->agency_id) && $user->agency_id == $a->id ? 'selected' : null }}>{{ $a->id ?? null }} - {{ $a->fullname ?? null }} - {{ $a->email ?? null }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="country">Quốc gia</label>
                    <select name="country" id="country" class="form-select select2">
                        <option value="">Lựa chọn</option>
                        @foreach($country as $c)
                        <option value="{{ $c->id ?? null }}" {{ !empty($user->country_id) && $user->country_id == $c->id ? 'selected' : null }}>{{ $c->name ?? null }}</option>
                        @endforeach
                    </select>
                </div>

                @php
                    $selectedCategories = !empty($user) ? $user->categoryProducts->pluck('id')->toArray() : [];
                @endphp

                <div class="col-md-6">
                    <label class="form-label" for="category_product">Lĩnh vực hoạt động</label>
                    <select name="category_product[]" id="category_product" class="form-select select2" multiple="">
                        <option value="">Lựa chọn</option>
                        @if(!empty($category_product))
                            @foreach($category_product as $cate)
                                <option value="{{ $cate->id ?? null }}" {{ in_array($cate->id, $selectedCategories) ? 'selected' : '' }}>{{ $cate->detail->title ?? null }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>

            <hr>

            <i><small>Khởi tạo: {{ $user->created_at ?? null }}</small></i><br>
            <i><small>Cập nhật: {{ $user->updated_at ?? null }}</small></i>
            
            {{ vdh_button_form() }}
            
        </form>
    </div>

</div>

@endsection