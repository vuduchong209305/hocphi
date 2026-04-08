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

                <div class="col-md-6">
                    <label class="form-label" for="email">Email <span class="text-danger">(*)</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email (*)" autofocus="" required value="{{ !empty($data->email) ? $data->email : old('email') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="fullname">Họ & tên <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ & tên (*)" autofocus="" required value="{{ !empty($data->fullname) ? $data->fullname : old('fullname') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="phone">Số điện thoại <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Số điện thoại (*)" autofocus="" required value="{{ !empty($data->phone) ? $data->phone : old('phone') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="company">Đơn vị công tác <span class="text-danger">(*)</span></label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Công ty (*)" autofocus="" required value="{{ !empty($data->company) ? $data->company : old('company') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="cccd">CCCD</label>
                    <input type="text" class="form-control" id="cccd" name="cccd" placeholder="CCCD" autofocus="" value="{{ !empty($data->cccd) ? $data->cccd : old('cccd') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="birthday">Năm sinh</label>
                    <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Năm sinh" autofocus="" value="{{ !empty($data->birthday) ? $data->birthday : old('birthday') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="paid_at">Trạng thái <span class="badge bg-success-subtle text-success fw-semibold rounded-pill">{{ $data->paid_at }}</span></label>
                    <select name="paid_at" id="paid_at" class="form-control">
                        <option value="1" {{ isset($data->paid_at) && $data->paid_at == 1 ? 'selected' : null }}>Đã thanh toán</option>
                        <option value="" {{ is_null($data->paid_at) ? 'selected' : null }}>Chưa thanh toán</option>
                    </select>
                </div>

            </div>

            <hr>

            <div class="row">
            	<div class="col-md-6">
	            	<p>Khóa học: <b>{{ $data->course->title ?? null }}</b></p>
	            	<p>Mã thanh toán: <b>{{ $data->code ?? null }}</b></p>
	            </div>
            </div>
            

            {{ vdh_button_form() }}
            
        </form>
    </div>

</div>

@endsection