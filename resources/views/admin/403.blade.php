@extends('organizer.layout') 
@section('title', '403') 
@section('content')

<div class="card">
    <div class="card-body">
    	<div class="text-center">
            <div class="mb-0">
                <h3 class="fw-semibold text-dark text-capitalize">Không có quyền</h3>
                <p class="text-muted">Bạn không có quyền truy cập vào tác vụ này</p>
            </div>

            <a class="btn btn-primary mt-3 me-1" href="{{ route('organizer.dashboard') }}">Về trang chủ</a>

        </div>
    </div>
</div>

@endsection