@extends('admin.layout')
@section('title', 'Danh sách')
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Danh sách Tài khoản người dùng hệ thống (Exhibitor + Visitor)</h5>
    </div>
    <div class="card-body">
        <form action="">
            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">Triển lãm</label>
                    <select name="exhibition_id" id="exhibition" class="form-control exhibition" data-allow-clear="true" data-placeholder="Chọn triển lãm">
                        <option value=""></option>
                        @if(!empty($exhibitions))
                            @foreach($exhibitions as $exhibition)
                                <option value="{{ $exhibition->id ?? null }}" data-logo="{{ !empty($exhibition->logo) ? asset($exhibition->logo) : no_image() }}" {{ request('exhibition_id') == $exhibition->id ? 'selected' : null }}>
                                    {{ $exhibition->detail->title ?? null }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-control">
                        <option value="">Tất cả</option>
                        @if(!empty($user_type))
                            @foreach($user_type as $type)
                            <option value="{{ $type->id ?? null }}" {{ request('type') == $type->id ? 'selected' : null }}>{{ $type->name ?? null }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Đại lý</label>
                    <select name="agency_id" class="form-control">
                        <option value="">Tất cả</option>
                        @if(!empty($agency))
                            @foreach($agency as $a)
                                <option value="{{ $a->id ?? null }}" {{ request('agency_id') == $a->id ? 'selected' : null }}>
                                    {{ $a->email ?? null }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                @php $per_pages = [50, 100, 200, 500] @endphp
                <div class="col-md-2">
                    <label class="form-label">Per page</label>
                    <select name="per_page" class="form-control">
                        <option value="">Mặc định</option>
                        @foreach($per_pages as $perpage)
                        <option value="{{ $perpage }}" {{ $perpage == request('per_page') ? 'selected' : null }}>{{ $perpage }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label">Từ khóa</label>
                    <div class="input-wrapper input-group input-group-merge">
                        <input type="text" class="form-control" placeholder="Enter keyword" name="q" value="{{ request('q') }}">
                        <button class="btn btn-success waves-effect" type="submit"><i class="ti ti-search"></i></button>
                    </div>
                </div>

                <div class="col-md-2">
                    <label class="form-label">Send Mail Register Exhibitor</label>
                    <select name="is_send_mail_register" class="form-control select2" data-allow-clear="true">
                        <option value="">Select</option>
                        <option value="1" {{ request('is_send_mail_register') == '1' ? 'selected' : null }}>Sent</option>
                        <option value="0" {{ request('is_send_mail_register') == '0' ? 'selected' : null }}>Unsent</option>
                    </select>
                </div>

            </div>
        </form>

    </div>
</div>

<div class="row">
 
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <a class="btn btn-sm btn-secondary" href="{{ route('user.create') }}">Thêm tài khoản&nbsp;&nbsp;<i class="ti ti-circle-plus"></i></a>
                    <a class="btn btn-sm btn-outline-danger btn_del_multi" href="javascript:;"><i class="ti ti-trash"></i>&nbsp;&nbsp;Xóa</a>
                    <input type="hidden" id="url" value="{{ route('user.delete') }}" >
                </div>
            </div>
            
            <div class="card-body">

                {{ !empty($data) ? vdh_paginate($data, $data->total()) : null }}

                <div class="table-responsive">
                    <table class="table table-hover table-vcenter table-bordered table-striped" id="datatable" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center" width="5%">
                                    <input type="checkbox" class="form-check-input checkall">
                                </th>
                                <th width="5%">Avatar</th>
                                <th width="25%">Doanh nghiệp</th>
                                <th width="20%">Liên hệ</th>
                                <th width="10%">Trạng thái</th>
                                <th width="10%">Gian hàng</th>
                                <th width="10%">QR Code</th>
                                <th width="10%">Triển lãm</th>
                                <th width="5%">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($data) && count($data) > 0) 
                            @foreach($data as $key => $val)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input checkbox_id" value="{{ $val->id ?? null }}">
                                </td>

                                <td>
                                    <a href='{{ viewImage($val->avatar) ?? no_image() }}' data-fancybox='gallery'>
                                        <img src="{{ viewImage($val->avatar) ?? no_image() }}" class="rounded" width="100%" alt="{{ $val->fullname ?? null }}">
                                    </a>
                                </td>

                                <td>
                                    <a href="{{ route('user.create', ['id' => $val->id]) }}">
                                        <h6 class="mb-1 text-dark fs-14 hide-line-clamp" data-bs-toggle="tooltip" title="{{ $val->company ?? null }}">{{ $val->company ?? null }}</h6>
                                    </a>
                                    <span class="fs-14 text-muted hide-line-clamp" data-bs-toggle="tooltip" title="{{ $val->fullname ?? null }}">{{ $val->fullname ?? null }}</span>
                                </td>

                                <td>
                                    <h6 class="mb-1 text-dark fs-14 hide-line-clamp" data-bs-toggle="tooltip" title="{{ $val->email ?? null }}">{{ $val->email ?? null }}</h6>
                                    <span class="fs-14 text-muted hide-line-clamp" data-bs-toggle="tooltip" title="{{ $val->phone ?? null }}">{{ $val->phone ?? null }}</span>

                                    @if(!empty($val->reference))
                                        <small class="hide-line-clamp small text-muted">
                                            <i>thuộc đoàn {{ $val->reference ?? null }}: {{ $val->referenceGroup->fullname ?? null }}</i>
                                        </small>
                                    @endif
                                </td>

                                <td>
                                    {!! vdh_user_type($val->type, $val->userType->name ?? null) !!}
                                    <br>
                                    {!! vdh_status($val->status) !!}
                                
                                    @if(!empty($val->is_send_mail_register))
                                    <div>
                                        <span class="badge badge-dot bg-success me-1"></span><small><i>Send mail Exhibitor</i>&nbsp;<i class="clear-send-mail ti ti-square-x"></i></small>
                                    </div>
                                    @endif
                                </td>

                                <td>
                                    {{ $val->booth ?? null }}
                                </td>

                                <td>
                                    @if(!empty($val->qr_code))
                                        <a href="{{ asset($val->qr_code ?? null) }}" data-fancybox="gallery" class="me-2">
                                            <img src="{{ asset($val->qr_code ?? null) }}" width="30%">
                                        </a>
                                        <button type="button" class="btn btn-outline-primary btn-sm print" data-id="{{ $val->id }}" data-code="{{ $val->code }}" data-exhibition="{{ $val->exhibition->id }}" data-bs-toggle='tooltip' data-bs-original-title='Print'><i class="ti ti-printer"></i></button>
                                    @endif
                                </td>

                                <td>
                                    @if(!empty($val->exhibition))
                                    <a href="{{ !empty($val->exhibition->logo) ? asset($val->exhibition->logo) : no_image() }}" data-fancybox>
                                        <img src="{{ !empty($val->exhibition->logo) ? asset($val->exhibition->logo) : no_image() }}" alt="{{ $val->exhibition->detail->title ?? null }}" title="{{ $val->exhibition->detail->title ?? null }}" class="rounded" data-bs-toggle="tooltip" width="100%">
                                    </a>
                                    @endif
                                </td>
                                <td>
                                    {{ vdh_label_button(route('user.create', ['id' => $val->id]), route('user.delete', ['id' => $val->id])) }}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                
                {{ !empty($data) ? vdh_paginate($data, $data->total()) : null }}

            </div>
        </div>
    </div>

</div>

@endsection