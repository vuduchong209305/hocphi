@extends('admin.layout')
@section('title', 'Danh sách')
@section('content')

<div class="card">
    <div class="card-body">

        <form action="#">
            <div class="row">

                <div class="col-md-3">
                    <label class="form-label">Khóa học</label>
                    <select name="course_id" id="course_id" class="form-control">
                        <option value="">Tất cả</option>
                        @foreach($courses as $c)
                        <option value="{{ $c->id ?? null }}" {{ $c->id == request('course_id') ? 'selected' : null }}>{{ $c->title ?? null }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Người phụ trách</label>
                    <select name="assigned_to" id="assigned_to" class="form-control">
                        <option value="">Tất cả</option>
                        @foreach($admins as $admin)
                        <option value="{{ $admin->id }}" {{ !empty($admin->id) && request('assigned_to') == $admin->id ? 'selected' : null }}>{{ $admin->fullname ?? $admin->email }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Trạng thái</label>
                    <select name="status_id" id="status_id" class="form-control">
                        <option value="">Tất cả</option>
                        @foreach($status as $st)
                        <option value="{{ $st->id }}" {{ !empty($st->id) && request('status_id') == $st->id ? 'selected' : null }}>{{ $st->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Thanh toán</label>
                    <select name="paid_at" id="paid_at" class="form-control">
                        <option value="">Tất cả</option>
                        <option value="1" {{ request('paid_at') == 1 ? 'selected' : null }}>Đã thanh toán</option>
                        <option value="0" {{ request('paid_at') == '0' ? 'selected' : null }}>Chưa thanh toán</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Tìm kiếm</label>
                    <div class="form-group">
                        <div class="input-wrapper input-group input-group-merge">
                            <input type="text" class="form-control" placeholder="Tìm kiếm" name="q" value="{{ request('q') }}">
                            <button class="btn btn-success" type="submit"><i class="ti ti-search"></i></button>
                        </div>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

<div class="card">

    <div class="card-header">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <a class="btn btn-sm btn-success export" href="javascript:;">Xuất file Excel&nbsp;&nbsp;<i class="ti ti-download"></i></a>
        </div>
    </div>

    <div class="card-body">

        {{ !empty($orders) ? vdh_paginate($orders, $orders->total()) : null }}

        <table class="table table-hover table-vcenter table-bordered table-striped" id="datatable" width="100%">
            <thead>
                <tr>
                    <th width="10%">Mã thanh toán</th>
                    <th width="40%">Khóa học</th>
                    <th width="25%">Thông tin</th>
                    <th width="20%">Giấy tờ</th>
                    <th width="5%">#</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($orders) && count($orders) > 0) 
                    @foreach($orders as $key => $val)
                        <tr>
                            <td>
                                <p class="mb-0">{{ $val->code ?? null }}</p>

                                <p class="mb-2">
                                    {!! !empty($val->paid_at) ? "<span class='badge bg-success-subtle text-success fw-semibold rounded-pill'>{$val->paid_at}</span>" : '<span class="badge bg-warning-subtle text-warning fw-semibold rounded-pill">Chưa thanh toán</span>' !!}
                                </p>

                                <p class="mb-2">
                                    <a href="#" data-type="select" class="assigned_to" data-name="assigned_to" data-pk="{{ $val->id ?? null }}" data-url="{{ route('order.update') }}" data-title="Người phụ trách" data-value="{{ $val->assigned_to }}">{{ $val->assignedTo->fullname ?? 'Người phụ trách' }}</a>
                                </p>

                                <p class="mb-0">
                                    <a href="#" data-type="select" class="status" data-name="status_id" data-pk="{{ $val->id ?? null }}" data-url="{{ route('order.update') }}" data-title="Trạng thái" data-value="{{ $val->status_id }}">{{ $val->status->name ?? 'Trạng thái' }}</a>
                                </p>
                            </td>
                            <td>
                                <p class="mb-0">Tên: <b>{{ $val->course->title ?? null }}</b></p>
                                <p class="mb-0">Lớp: {{ $val->class_code ?? null }}</p>
                                <p class="mb-0">Khai giảng: {{ $val->start_date ?? null }}</p>
                                <p class="mb-0">Giá: {{ $val->price ? vdh_format_money($val->price) : 'N/A' }}</p>
                                <p class="mb-0">Ngày đăng ký: {{ $val->created_at }}</p>
                                <p class="mb-0">Xuất hóa đơn: {{ $val->is_vat == 1 ? 'Có' : 'Không' }}</p>
                            </td>
                            <td>
                                <p class="mb-0">Họ tên: <b>{{ $val->fullname ?? null }}</b></p>
                                <p class="mb-0">Email: {{ $val->email ?? null }}</p>
                                <p class="mb-0">Số điện thoại: {{ $val->phone ?? null }}</p>
                                <p class="mb-0">CCCD: {{ $val->cccd ?? null }}</p>
                                <p class="mb-0">Năm sinh: {{ $val->birthday ?? null }}</p>
                                <p class="mb-0">Đơn vị: {{ $val->company ?? null }}</p>
                            </td>
                            <td>
                                <a href="{{ viewImage($val->cccd_front) }}" data-fancybox="gallery">
                                    <img src="{{ viewImage($val->cccd_front) }}" alt="CCCD mặt trước" width="60px" class="rounded">
                                </a>
                                
                                <a href="{{ viewImage($val->cccd_back) }}" data-fancybox="gallery">
                                    <img src="{{ viewImage($val->cccd_back) }}" alt="CCCD mặt sau" width="60px" class="rounded">
                                </a>
                                
                                <a href="{{ viewImage($val->degree) }}" data-fancybox="gallery">
                                    <img src="{{ viewImage($val->degree) }}" alt="Bằng cấp" width="60px" class="rounded">
                                </a>

                                <a href="{{ viewImage($val->signature) }}" data-fancybox="gallery">
                                    <img src="{{ viewImage($val->signature) }}" alt="Chữ ký" width="60px" class="rounded">
                                </a>
                            </td>
                            <td>
                                {{ vdh_label_button(route('order.create', ['id' => $val->id]), route('order.delete', ['id' => $val->id])) }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        {{ !empty($orders) ? vdh_paginate($orders, $orders->total()) : null }}
    </div>
</div>

@push('scripts')
    <script>

        $('.assigned_to').editable({
            sourceCache: true,
            source: '{{ route("admin.list") }}'
        });

        $('.status').editable({
            sourceCache: true,
            source: '{{ route("order.status") }}'
        });

        $('.export').click(function(){
            Swal.fire({
                title: `Xuất file Excel`,
                text: `Danh sách đăng ký => Excel`,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Xuất file',
                cancelButtonText: 'Đóng',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('order.export') }}',
                        method: 'post',
                        data: {
                            course_id: '{{ request('course_id') }}',
                            paid_at: '{{ request('paid_at') }}',
                            q: '{{ request('q') }}'
                        },
                        success(res) {
                            if(res.status) {
                                window.open(res.data);
                            }
                        },
                        error(err) {
                            console.log(err)
                        }
                    })
                }
            });
        });
    </script>
@endpush

@endsection