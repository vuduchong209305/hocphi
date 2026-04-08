@extends('admin.layout')
@section('title', 'Danh sách')
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Danh sách tài khoản Quản trị viên</h5>
    </div>
    <div class="card-body">

        <form action="">
            <div class="row">
                <div class="col-md-5">
                    <label for="role_id" class="form-label">Phân quyền</label>
                    <select name="role_id" id="role_id" class="form-select">
                        <option value="">Tất cả</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id ?? null }}" {{ $role->id == request('role_id') ? 'selected' : null }}>
                                {{ $role->name ?? null }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="q" class="form-label">Tìm kiếm</label>
                    <div class="input-group">
                        <input type="text" id="q" name="q" placeholder="Email, họ tên, điện thoại" value="{{ request('q') }}" class="form-control">
                        <button type="submit" class="btn btn-success"><i class="ti ti-search"></i></button>
                    </div>
                </div>

            </div>
        </form>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <a class="btn btn-sm btn-secondary" href="{{ route('admin.create') }}">Thêm tài khoản&nbsp;&nbsp;<i class="ti ti-circle-plus"></i></a>
            <a class="btn btn-sm btn-outline-danger btn_del_multi" href="javascript:;">Xóa&nbsp;&nbsp;<i class="ti ti-trash"></i></a>
            <input type="hidden" id="url" value="{{ route('admin.delete') }}" >
        </div>
    </div>
    <div class="card-body">

        @php !empty($data) ? vdh_paginate($data, $data->total()) : null @endphp

        <div class="table-responsive text-nowrap text-break">
            <table class="table table-hover table-vcenter table-striped table-borderless table-centered">
                <thead class="text-muted table-light">
                    <tr>
                        <th class="text-center" width="5%">
                            <input type="checkbox" class="form-check-input checkall">
                        </th>
                        <th width="5%">Avatar</th>
                        <th width="20%">Họ tên</th>
                        <th width="20%">Email</th>
                        <th width="20%">Số điện thoại</th>
                        <th width="10%">Nhóm</th>
                        <th width="10%">Trạng thái</th>
                        <th width="10%">#</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if(!empty($data)) 
                        @foreach($data as $key => $val)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input checkbox_id" value="{{ $val->id ?? null }}">
                            </td>
                            <td>
                                <img src="{{ empty($val->avatar) ? no_image() : asset($val->avatar) }}" alt="{{ $val->email ?? null }}" title="{{ $val->email ?? null }}" width="100%" class="rounded">
                            </td>
                            <td>
                                {{ $val->fullname ?? null }}
                            </td>
                            <td>
                                {{ $val->email ?? null }}
                            </td>
                            <td>
                                {{ $val->phone ?? null }}
                            </td>
                            <td>
                                <span class="badge text-bg-success">{{ $val->role->name ?? null }}</span>
                            </td>
                            <td>
                                {!! vdh_status($val->status) !!}
                            </td>
                            <td>
                                {{ vdh_label_button(route('admin.create', ['id' => $val->id]), route('admin.delete', ['id' => $val->id])) }}
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>

        @php !empty($data) ? vdh_paginate($data, $data->total()) : null @endphp
    </div>
</div>

@endsection