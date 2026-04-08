@extends('admin.layout')
@section('title', 'Phân quyền')
@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Danh sách Nhóm quyền</h5>
    </div>
    <div class="card-body">

        <form action="">
            <div class="row">
                <div class="col-md-3">
                    <label for="q" class="form-label">Tìm kiếm</label>
                    <div class="input-group">
                        <input type="text" id="q" name="q" placeholder="Từ khóa" value="{{ request('q') }}" class="form-control">
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
            <a class="btn btn-sm btn-secondary" href="{{ route('admin.role.create') }}">Thêm nhóm quyền&nbsp;&nbsp;<i class="ti ti-circle-plus"></i></a>
            <a class="btn btn-sm btn-outline-danger btn_del_multi" href="javascript:;">Xóa&nbsp;&nbsp;<i class="ti ti-trash"></i></a>
            <input type="hidden" id="url" value="{{ route('admin.role.delete') }}" >
        </div>
    </div>
    <div class="card-body">

        @php !empty($data) ? vdh_paginate($data, $data->total()) : null @endphp

        <div class="table-responsive text-wrap text-break">
            <table class="table table-hover table-vcenter table-striped table-borderless table-centered" width="100%">
                <thead class="text-muted table-light">
                    <tr>
                        <th class="text-center" width="5%">
                            <input type="checkbox" class="checkall">
                        </th>
                        <th width="10%">Tên</th>
                        <th width="15%">Mô tả</th>
                        <th width="60%">Permissions</th>
                        <th width="10%">#</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($data) && count($data) > 0) 
                        @foreach($data as $key => $val)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="checkbox_id" value="{{ $val->id ?? null }}">
                            </td>

                            <td>
                                {{ $val->name ?? null }}
                            </td>

                            <td>
                                {{ $val->description ?? null }}
                            </td>

                            <td>
                                {{ $val->permission ?? null }}
                            </td>

                            <td>
                                {{ vdh_label_button(route('admin.role.create', ['id' => $val->id]), route('admin.role.delete', ['id' => $val->id])) }}
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