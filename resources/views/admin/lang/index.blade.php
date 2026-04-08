@extends('admin.layout')
@section('title', 'Danh sách')
@section('content')

<div class="card">

    <div class="card-header">
        <h5 class="card-title mb-0">Ngôn ngữ hệ thống</h5>
    </div>

    <div class="card-body">

        <form action="{{ route('setting.lang.index') }}">
            <div class="row">

                <div class="col-md-3">
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

<div class="row">
 
    <div class="col-md-3">
        <div class="card">

            <div class="card-body">

                <form action="{{ route('setting.lang.store') }}" method="post" enctype="multipart/form-data">

                    @csrf

                    <h4>
                        @if(request('id')) 
                            Cập nhật

                            @method('PUT')
                            <input type="hidden" name="id" value="{{ request('id') }}">
                        @else
                            Thêm mới
                        @endif
                    </h4>
                        
                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Tên <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên *" required="" autofocus="" value="{{ !empty($lang->name) ? $lang->name : old('name') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="title">Tiêu đề <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề *" required="" autofocus="" value="{{ !empty($lang->title) ? $lang->title : old('title') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="lang_class">Lang class</label>
                        <input type="text" class="form-control" id="lang_class" name="lang_class" placeholder="Tiêu đề *" autofocus="" value="{{ !empty($lang->lang_class) ? $lang->lang_class : old('lang_class') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="description">Mô tả</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Tiêu đề *" autofocus="" value="{{ !empty($lang->description) ? $lang->description : old('description') }}">
                    </div>

                    {{ vdh_upload_ckfinder(!empty($lang->image) ? $lang->image : old('image'), 'image') }}
                    {{ vdh_input_status(!empty($lang->status) ? $lang->status : old('status')) }}
                    {{ vdh_button_form() }}

                </form>

            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-row justify-content-between align-items-center">
                    <a class="btn btn-sm btn-outline-danger btn_del_multi" href="javascript:;"><i class="ti ti-trash"></i>&nbsp;&nbsp;Xóa</a>
                    <input type="hidden" id="url" value="{{ route('setting.lang.delete') }}" >
                </div>
            </div>
            <div class="card-body">

                {{ !empty($data) ? vdh_paginate($data, $data->total()) : null }}

                <table class="table table-hover table-vcenter table-bordered table-striped" id="datatable" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">
                                <input type="checkbox" class="form-check-input checkall">
                            </th>
                            <th width="10%">Ảnh</th>
                            <th width="15%">Tên</th>
                            <th width="15%">Tiêu đề</th>
                            <th width="15%">Lang class</th>
                            <th width="20%">Mô tả</th>
                            <th width="10%">Trạng thái</th>
                            <th width="10%">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($data) && count($data) > 0) 
                        @foreach($data as $key => $val)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="form-check-input checkbox_id" value="{{ $val->id ?? null }}">
                            </td>
                            <td>
                                <img src="{{ $val->image ?? no_image() }}" width="100%" alt="{{ $val->title ?? null }}">
                            </td>
                            <td>
                                {{ $val->name ?? null }}
                            </td>
                            <td>
                                {{ $val->title ?? null }}
                            </td>
                            <td>
                                {{ $val->lang_class ?? null }}
                            </td>
                            <td>
                                {{ $val->description ?? null }}
                            </td>
                            <td>
                                {!! vdh_status($val->status) !!}
                            </td>
                            <td>
                                {{ vdh_label_button(route('setting.lang.index', ['id' => $val->id]), route('setting.lang.delete', ['id' => $val->id])) }}
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>

                {{ !empty($data) ? vdh_paginate($data, $data->total()) : null }}

            </div>
        </div>
    </div>

</div>

@endsection