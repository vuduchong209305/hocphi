@extends('admin.layout')
@section('title', 'Danh sách')
@section('content')

<div class="card">

    <div class="card-header">
        <h5 class="card-title mb-0">Danh sách Template Mail hệ thống</h5>
    </div>

    <div class="card-body">

        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex flex-row justify-content-between align-items-center">
                        <a class="btn btn-sm btn-secondary" href="{{ route('mail.create') }}">Thêm mới&nbsp;&nbsp;<i class="ti ti-circle-plus"></i></a>
                        {{-- <a class="btn btn-sm btn-outline-danger btn_del_multi" href="javascript:;"><i class="ti ti-trash"></i>&nbsp;&nbsp;Xóa</a>
                        <input type="hidden" id="url" value="{{ route('mail.delete') }}" > --}}
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-wrapper input-group input-group-merge">
                            <input type="text" class="form-control form-control-sm" placeholder="Tìm kiếm" name="q" value="{{ request('q') }}">
                            <button class="btn btn-sm btn-success" type="submit"><i class="ti ti-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
  
{{ !empty($data) ? vdh_paginate($data, $data->total()) : null }}

<div class="row">
    <div class="col-12">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
            @if(!empty($data) && count($data) > 0)
                @foreach($data as $key => $val)
                <div class="col">
                    <div class="card">
                        <h5 class="card-header">{{ $val->detail->subject ?? null }}</h5>
                        <div class="card-body">

                            <div style="max-width:600px;background-color:#ffffff;border:1px solid #e5e7eb;border-top:5px solid #009689;">
        
                                <!-- Header -->
                                <div style="text-align:center;padding:20px 20px 15px;border-bottom:1px solid #e5e7eb;">
                                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="max-width:180px;height:auto;">
                                </div>

                                <!-- Body -->
                                <div style="padding:25px;font-size:16px;line-height:1.6;">
                                    {!! $val->detail->body ?? null !!}
                                </div>

                                <!-- Footer -->
                                <div style="padding:20px 25px;font-size:14px;color:#7f8fa4;border-top:1px solid #e5e7eb;">
                                    <p style="margin-top:0;margin-bottom:5px;"><small><i>{{ __('layout.notice_mail') }}</i></small></p>
                                    <p style="margin:5px 0;">-----------------------------------------</p>
                                    <p style="margin-top:0;margin-bottom:5px;">
                                        <small>© {{ date('Y') }} 
                                            <a href="https://expoplus.vn" style="color:#009689;text-decoration:none;">Expoplus.vn</a>. All rights reserved.
                                        </small>
                                    </p>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer text-body-secondary bg-transparent border-top text-muted">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                <a type="button" class="btn btn-outline-success" href="{{ route('mail.preview', ['id' => $val->id]) }}" target="_blank">Xem trước</a>
                                <a type="button" class="btn btn-outline-success" href="{{ route('mail.create', ['id' => $val->id]) }}">Sửa</a>
                                <a type="button" class="btn btn-outline-success" href="{{ route('mail.delete', ['id' => $val->id]) }}">Xóa</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

{{ !empty($data) ? vdh_paginate($data, $data->total()) : null }}

@endsection