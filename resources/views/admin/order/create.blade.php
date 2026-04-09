@extends('admin.layout')
@section('title', 'Edit')
@section('content')

<div class="card">

    <div class="card-body">
        <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            @if(request('id')) 
                @method('PUT')
                <input type="hidden" name="id" value="{{ request('id') }}">
            @endif

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label" for="email">Email <span class="text-danger">(*)</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email (*)" autofocus="" required value="{{ !empty($data->email) ? $data->email : old('email') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fullname">Họ & tên <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ & tên (*)" autofocus="" required value="{{ !empty($data->fullname) ? $data->fullname : old('fullname') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="phone">Số điện thoại <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại (*)" autofocus="" required value="{{ !empty($data->phone) ? $data->phone : old('phone') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="company">Đơn vị công tác <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Công ty (*)" autofocus="" required value="{{ !empty($data->company) ? $data->company : old('company') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="cccd">CCCD</label>
                    <input type="text" class="form-control" id="cccd" name="cccd" placeholder="CCCD" autofocus="" value="{{ !empty($data->cccd) ? $data->cccd : old('cccd') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="gender">Giới tính</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Lựa chọn</option>
                        <option value="1" {{ !empty($data->gender) && $data->gender == 1 ? 'selected' : null }}>Nam</option>
                        <option value="2" {{ !empty($data->gender) && $data->gender == 2 ? 'selected' : null }}>Nữ</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="birthday">Năm sinh</label>
                    <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Năm sinh" autofocus="" value="{{ !empty($data->birthday) ? $data->birthday : old('birthday') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="birthplace">Nơi sinh</label>
                    <input type="text" class="form-control" id="birthplace" name="birthplace" placeholder="Nơi sinh" autofocus="" value="{{ !empty($data->birthplace) ? $data->birthplace : old('birthplace') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="address">Địa chỉ trên CCCD/VNEID (Sau sát nhập)</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Địa chỉ trên CCCD/VNEID (Sau sát nhập)" autofocus="" value="{{ !empty($data->address) ? $data->address : old('address') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="address_cme">Địa chỉ nhận CME (Trước sát nhập)</label>
                    <input type="text" class="form-control" id="address_cme" name="address_cme" placeholder="Địa chỉ nhận CME (Trước sát nhập)" autofocus="" value="{{ !empty($data->address_cme) ? $data->address_cme : old('address_cme') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="graduate_year">Năm tốt nghiệp</label>
                    <input type="text" class="form-control" id="graduate_year" name="graduate_year" placeholder="Năm tốt nghiệp" autofocus="" value="{{ !empty($data->graduate_year) ? $data->graduate_year : old('graduate_year') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="graduate_address">Nơi tốt nghiệp</label>
                    <input type="text" class="form-control" id="graduate_address" name="graduate_address" placeholder="Nơi tốt nghiệp" autofocus="" value="{{ !empty($data->graduate_address) ? $data->graduate_address : old('graduate_address') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="education">Trình độ chuyên môn</label>
                    <select name="education" id="education" class="form-control">
                        <option value="">Lựa chọn</option>
                        <option value="1" {{ !empty($data->education) && $data->education == 1 ? 'selected' : null }}>THPT</option>
                        <option value="2" {{ !empty($data->education) && $data->education == 2 ? 'selected' : null }}>Trung cấp</option>
                        <option value="3" {{ !empty($data->education) && $data->education == 3 ? 'selected' : null }}>Cao đẳng</option>
                        <option value="4" {{ !empty($data->education) && $data->education == 4 ? 'selected' : null }}>Đại học</option>
                        <option value="5" {{ !empty($data->education) && $data->education == 5 ? 'selected' : null }}>Sau đại học</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="mst">Mã số thuế (nếu xuất hóa đơn)</label>
                    <input type="text" class="form-control" id="mst" name="mst" placeholder="Mã số thuế (nếu xuất hóa đơn)" autofocus="" value="{{ !empty($data->mst) ? $data->mst : old('mst') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="paid_at">Trạng thái <span class="badge bg-success-subtle text-success fw-semibold rounded-pill">{{ $data->paid_at }}</span></label>
                    <select name="paid_at" id="paid_at" class="form-control">
                        <option value="1" {{ isset($data->paid_at) && $data->paid_at == 1 ? 'selected' : null }}>Đã thanh toán</option>
                        <option value="" {{ is_null($data->paid_at) ? 'selected' : null }}>Chưa thanh toán</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="price">Thanh toán</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Thanh toán" autofocus="" value="{{ !empty($data->price) ? $data->price : old('price') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="class_code">Mã lớp</label>
                    <input type="text" class="form-control" id="class_code" name="class_code" placeholder="Mã lớp" autofocus="" value="{{ !empty($data->class_code) ? $data->class_code : old('class_code') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="start_date">Ngày khai giảng</label>
                    <input type="text" class="form-control flatpickr" id="start_date" name="start_date" placeholder="Mã lớp" autofocus="" value="{{ !empty($data->start_date) ? $data->start_date : old('start_date') }}">
                </div>
            </div>

            <hr>

            <div class="row">
            	<div class="col-md-6">
	            	<p>Khóa học: <b>{{ $data->course->title ?? null }}</b></p>
	            	<p>Mã thanh toán: <b>{{ $data->code ?? null }}</b></p>
	            </div>
            </div>
            
            <hr>

            <div class="row">
                <div class="col-md-1">
                    <label for="" class="form-label">CCCD mặt trước</label>
                    <a href="{{ viewImage($data->cccd_front) }}" data-fancybox="gallery">
                        <img src="{{ viewImage($data->cccd_front) }}" alt="CCCD mặt trước" width="100%" class="rounded">
                    </a>
                </div>

                <div class="col-md-1">
                    <label for="" class="form-label">CCCD mặt sau</label>
                    <a href="{{ viewImage($data->cccd_back) }}" data-fancybox="gallery">
                        <img src="{{ viewImage($data->cccd_back) }}" alt="CCCD mặt sau" width="100%" class="rounded">
                    </a>
                </div>

                <div class="col-md-1">
                    <label for="" class="form-label">Bằng cấp</label>
                    <a href="{{ viewImage($data->degree) }}" data-fancybox="gallery">
                        <img src="{{ viewImage($data->degree) }}" alt="Bằng cấp" width="100%" class="rounded">
                    </a>
                </div>

                <div class="col-md-1">
                    <label for="" class="form-label">Chữ ký</label>
                    <a href="{{ viewImage($data->signature) }}" data-fancybox="gallery">
                        <img src="{{ viewImage($data->signature) }}" alt="Chữ ký" width="100%" class="rounded">
                    </a>
                </div>
            </div>

            {{ vdh_button_form() }}
            
        </form>
    </div>

</div>

@endsection