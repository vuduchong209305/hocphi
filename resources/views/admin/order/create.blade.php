@extends('admin.layout')
@section('title', 'Edit')
@section('content')

<div class="card">

    <div class="card-body">
        <form action="{{ route('order.store') }}" method="post" enctype="multipart/form-data">

            @csrf

            <input type="hidden" name="id" value="{{ request('id') }}">

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
                    <input type="text" class="form-control flatpickr" id="birthday" name="birthday" placeholder="Năm sinh" autofocus="" value="{{ !empty($data->birthday) ? $data->birthday : old('birthday') }}">
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
                        @foreach($educations as $education)
                        <option value="{{ $education->id ?? null }}" {{ !empty($data->education) && $data->education == $education->id ? 'selected' : null }}>{{ $education->title ?? null }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="class_code">Mã lớp</label>
                    <input type="text" class="form-control" id="class_code" name="class_code" placeholder="Mã lớp" autofocus="" value="{{ !empty($data->class_code) ? $data->class_code : old('class_code') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="start_date">Ngày khai giảng</label>
                    <input type="text" class="form-control flatpickr" id="start_date" name="start_date" placeholder="Mã lớp" autofocus="" value="{{ !empty($data->start_date) ? $data->start_date : old('start_date') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="price">Thanh toán</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Thanh toán" autofocus="" value="{{ !empty($data->price) ? $data->price : old('price') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="paid_at">Trạng thái <span class="badge bg-success-subtle text-success fw-semibold rounded-pill">{{ $data->paid_at }}</span></label>
                    <select name="paid_at" id="paid_at" class="form-control">
                        <option value="1" {{ isset($data->paid_at) && $data->paid_at == 1 ? 'selected' : null }}>Đã thanh toán</option>
                        <option value="" {{ is_null($data->paid_at) ? 'selected' : null }}>Chưa thanh toán</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="assigned_to">Giao cho </label>
                    <select name="assigned_to" id="assigned_to" class="form-control">
                        <option value="">Lựa chọn</option>
                        @foreach($admins as $admin)
                        <option value="{{ $admin->id }}" {{ !empty($data->assigned_to) && $admin->id == $data->assigned_to ? 'selected' : null }}>{{ $admin->fullname ?? $admin->email }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <hr>
            
            <div class="row">
                <div class="col-md-3">
                    {{ vdh_upload_avatar($data->cccd_front, 'cccd_front') }}
                </div>

                <div class="col-md-3">
                    {{ vdh_upload_avatar($data->cccd_back, 'cccd_back') }}
                </div>

                <div class="col-md-3">
                    {{ vdh_upload_avatar($data->degree, 'degree') }}
                </div>

                <div class="col-md-3">
                    {{ vdh_upload_avatar($data->signature, 'signature') }}
                </div>
            </div>

            {{ vdh_button_form() }}
            
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p>Khóa học: <b>{{ $data->course->title ?? null }}</b></p>
                <p>Mã thanh toán: <b>{{ $data->code ?? null }}</b></p>

                <p>Yêu cầu xuất hóa đơn: <b>{{ !empty($data->is_vat) ? 'Có' : 'Không' }}</b></p>
                @if(!empty($data->is_vat))
                <ul>
                    <li>
                        Mã số thuế: <a href="javascript:;" class="live-edit" data-type="textarea" id="mst" data-name="mst" data-pk="{{ $data->id ?? null }}" data-url="{{ route('order.update') }}" data-title="Mã số thuế">{{ $data->mst ?? null }}</a>
                    </li>
                    <li>
                        Tên đơn vị: <a href="javascript:;" class="live-edit" data-type="textarea" id="mst_name" data-name="mst_name" data-pk="{{ $data->id ?? null }}" data-url="{{ route('order.update') }}" data-title="Tên đơn vị">{{ $data->mst_name ?? null }}</a>
                    </li>
                    <li>
                        Địa chỉ đơn vị: <a href="javascript:;" class="live-edit" data-type="textarea" id="mst_address" data-name="mst_address" data-pk="{{ $data->id ?? null }}" data-url="{{ route('order.update') }}" data-title="Địa chỉ đơn vị">{{ $data->mst_address ?? null }}</a>
                    </li>
                    <li>
                        Mã quan hệ ngân sách: <a href="javascript:;" class="live-edit" data-type="textarea" id="relation_code" data-name="relation_code" data-pk="{{ $data->id ?? null }}" data-url="{{ route('order.update') }}" data-title="Mã quan hệ ngân sách">{{ $data->relation_code ?? null }}</a>
                    </li>
                </ul>
                @endif

                <button class="btn btn-sm btn-outline-secondary" id="send" type="button">Gửi mail xác nhận</button>
                <a href="{{ route('order.pdf', ['id' => request('id')]) }}" class="btn btn-sm btn-outline-warning">Tạo phiếu đăng ký</a>
            </div>
            <div class="col-md-6 text-end">
                <a href="https://api.vietqr.io/image/{{ HTMLHelper::getOption('bank_code') }}-{{ HTMLHelper::getOption('account_number') }}-Olvjj43.jpg?accountName={{ HTMLHelper::getOption('account_owner') }}&amount={{ !empty($data->price) ? $data->price : 0 }}&addInfo=CME {{ $data->code ?? null }} TT" data-fancybox>
                    <img src="https://api.vietqr.io/image/{{ HTMLHelper::getOption('bank_code') }}-{{ HTMLHelper::getOption('account_number') }}-Olvjj43.jpg?accountName={{ HTMLHelper::getOption('account_owner') }}&amount={{ !empty($data->price) ? $data->price : 0 }}&addInfo=CME {{ $data->code ?? null }} TT" alt="Mã thanh toán" width="200px">
                </a>
            </div>
        </div>

    </div>
</div>
@push('scripts')
    <script>
        $('#send').click(function(){
            if(!confirm('Gửi mail xác nhận')) return

            $.ajax({
                url: '{{ route('order.mail') }}',
                method: 'POST',
                data: {
                    id: '{{ request('id') }}'
                },
                success(res) {
                    if(res.status) {
                        notify('Thành công', res.message)
                    } else {
                        notify('Thất bại', 'Có lỗi xảy ra', 'error')
                    }
                },
                error(err) {
                    console.log(err)
                    notify('Có lỗi xảy ra', err, 'error')
                }
            })
        });
    </script>

@endpush
@endsection