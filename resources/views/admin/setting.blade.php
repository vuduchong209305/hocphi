@extends('admin.layout') 
@section('title', 'Setting') 
@section('content')
	
<form action="{{ route('setting.store') }}" method="post">
	<div class="row">
		<div class="col-md-3">
			<div class="card">

				<div class="card-header">
					<h5 class="card-title mb-0">Cấu hình chung</h5>
				</div>

			    <div class="card-body">

		        	@csrf

	    			<div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" id="phone" class="form-control" placeholder="Số điện thoại" name="option[phone]" value="{{ HTMLHelper::getOption('phone') }}">
                    </div>

                    <div class="mb-3">
                        <label for="zalo" class="form-label">Zalo</label>
                        <input type="text" id="zalo" class="form-control" placeholder="Zalo" name="option[zalo]" value="{{ HTMLHelper::getOption('zalo') }}">
                    </div>

                    <div class="mb-3">
                        <label for="facebook" class="form-label">Facebook</label>
                        <input type="text" id="facebook" class="form-control" placeholder="Facebook" name="option[facebook]" value="{{ HTMLHelper::getOption('facebook') }}">
                    </div>

                    <div class="mb-3">
                        <label for="messenger" class="form-label">Messenger</label>
                        <input type="text" id="messenger" class="form-control" placeholder="Messenger" name="option[messenger]" value="{{ HTMLHelper::getOption('messenger') }}">
                    </div>

                    <div class="mb-3">
                        <label for="bank_code" class="form-label">Mã ngân hàng</label>
                        <input type="text" id="bank_code" class="form-control" placeholder="Mã ngân hàng" name="option[bank_code]" value="{{ HTMLHelper::getOption('bank_code') }}">
                    </div>

                    <div class="mb-3">
                        <label for="account_number" class="form-label">Số tài khoản</label>
                        <input type="text" id="account_number" class="form-control" placeholder="Số tài khoản" name="option[account_number]" value="{{ HTMLHelper::getOption('account_number') }}">
                    </div>

                    <div class="mb-3">
                        <label for="account_owner" class="form-label">Chủ tài khoản</label>
                        <input type="text" id="account_owner" class="form-control" placeholder="Chủ tài khoản" name="option[account_owner]" value="{{ HTMLHelper::getOption('account_owner') }}">
                    </div>

	    			<div class="form-check form-switch mb-2">
		        		<input type="hidden" name="option[maintenance]" value="">
	                    <input class="form-check-input" type="checkbox" role="switch" id="maintenance" name="option[maintenance]" value="1" {{ HTMLHelper::getOption('maintenance') == 1 ? 'checked' : null }}>
	                    <label class="form-check-label" for="maintenance">Bảo trì</label>
	                </div>

	                <div class="form-check form-switch mb-2">
	                	<input type="hidden" name="option[robot_index]" value="">
	                    <input class="form-check-input" type="checkbox" role="switch" id="robot_index" name="option[robot_index]" value="1" {{ HTMLHelper::getOption('robot_index') == 1 ? 'checked' : null }}>
	                    <label class="form-check-label" for="robot_index">Robot index</label>
	                </div>

	                
		            <?php vdh_button_form() ?>
			        
			    </div>
			</div>
		</div>

		<div class="col-md-9">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title mb-0">Hero Typed trang chủ</h5>
				</div>
	            <div class="card-body">
	                {{ vdh_tabs_langs() }}

	                <div class="tab-content pt-3">
	                    @foreach(LangHelper::getLang() as $key => $lang)
	                    <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="tabs_{{ $lang->id }}" role="tabpanel">

	                        <div class="form-group mb-3">
	                            <label class="form-label" for="option[hero_typed][{{ $lang->name }}]">Nội dung {{ $lang->title }}</label>
	                            <textarea rows="5" class="form-control" id="option[hero_typed][{{ $lang->name }}]" name="option[hero_typed][{{ $lang->name }}]" placeholder="Tiêu đề trang chủ {{ $lang->title }}" autofocus="" value="{{ HTMLHelper::getOptionLang('hero_typed', $lang->name) }}" >{{ HTMLHelper::getOptionLang('hero_typed', $lang->name) }}</textarea>
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