@extends('admin.auth.layout') 
@section('title', 'Đăng nhập') 
@section('content')

<div class="auth-title-section mb-4 text-lg-start text-center"> 
    <h3 class="text-dark fw-semibold mb-3">Đăng nhập hệ thống ADMIN</h3>
</div>

<div class="pt-0">
    <form action="{{ route('post.login') }}" method="POST" class="my-4">

    	@csrf
    	
        <div class="form-group mb-3">
            <label for="email" class="form-label">Email</label>
            <input class="form-control" type="email" id="email" name="email" required="" placeholder="Email">
        </div>

        <div class="form-group mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input class="form-control" type="password" id="password" name="password" required="" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
        </div>

        <div class="form-group d-flex mb-3">
            <div class="col-sm-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                    <label class="form-check-label" for="checkbox-signin">Ghi nhớ đăng nhập</label>
                </div>
            </div>
            <div class="col-sm-6 text-end">
                <a class='text-muted fs-14' href='#'>Quên mật khẩu?</a>                             
            </div>
        </div>
        
        <div class="form-group mb-0 row">
            <div class="col-12">
                <div class="d-grid">
                    <button class="btn btn-primary fw-semibold" type="submit"> Đăng nhập </button>
                </div>
            </div>
        </div>
    </form>
    
</div>

@endsection