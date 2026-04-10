@extends('admin.layout')
@section('title', 'Thêm mới')
@section('content')

<form action="{{ route('mail.store') }}" method="post" enctype="multipart/form-data">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    @csrf

                    <div class="btn-group">
                        <a type="button" class="btn btn-primary" href="{{ route('mail.index') }}">
                            <i class="ti ti-list"></i>&nbsp;Danh sách
                        </a>
                    </div>

                    @if(request('id')) 
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ request('id') }}">
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <div class="form-group mb-3">
                        <label class="form-label" for="title">Tên <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Tên *" value="{{ !empty($data->title) ? $data->title : old('title') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="key">Key <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="key" name="key" placeholder="Key *" value="{{ !empty($data->key) ? $data->key : old('key') }}" required>
                    </div>

                    <?php vdh_input_status(!empty($data->status) ? $data->status : old('status')) ?>
                    <?php vdh_button_form() ?>
                </div>
            </div>

            <div class="card">
                <h5 class="card-header">Xem trước</h5>
                <div class="card-body">

                    <div style="max-width:600px;background-color:#ffffff;border:1px solid #e5e7eb;border-top:5px solid #009689;">

                        <!-- Header -->
                        <div style="text-align:center;padding:20px 20px 15px;border-bottom:1px solid #e5e7eb;">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="max-width:180px;height:auto;">
                        </div>

                        <!-- Body -->
                        <div style="padding:25px;font-size:16px;line-height:1.6;">
                            {!! $data->detail->body ?? null !!}
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
            </div>
        </div>

        <div class="col-md-8">

            <div class="card">
                <div class="card-body">

                    {{ vdh_tabs_langs() }}

                    <!-- Tab panes -->
                    <div class="tab-content pt-3">
                        @foreach(LangHelper::getLang() as $key => $lang)
                        <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="tabs_{{ $lang->id }}" role="tabpanel">
                            <div class="form-group mb-3">
                                <label class="form-label" for="subject_{{ $lang->id }}">Tiêu đề {{ $lang->title }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subject_{{ $lang->id }}" name="subject_{{ $lang->id }}" placeholder="Tiêu đề {{ $lang->subject }}" autofocus="" value="{{ !empty($data->details[$key]->subject) ? $data->details[$key]->subject : old('subject_' . $lang->id) }}">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label" for="body_{{ $lang->id }}">Nội dung {{ $lang->title }}</label>
                                <textarea rows="30" class="form-control" id="body_{{ $lang->id }}" name="body_{{ $lang->id }}" placeholder="Nội dung {{ $lang->title }}" autofocus="" value="{{ !empty($data->details[$key]->body) ? $data->details[$key]->body : old('body_' . $lang->id) }}" >{{ !empty($data->details[$key]->body) ? $data->details[$key]->body : old('body_' . $lang->id) }}</textarea>
                            </div>

                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
            
        </div>
        
    </div>
</form>

@endsection