@extends('index.layout') 
@section('title', 'Thanh toán') 
@section('content')

<section class="py-20 bg-white">
    <div class="flex flex-col items-center justify-center w-full">

    	<h2 class="text-3xl font-bold mb-4">Thanh toán khóa học</h2>
        <p class="text-gray-500 mb-10">Vui lòng nhập số điện thoại để tìm kiếm</p>
        <div class="max-w-7xl mx-auto px-3 md:gap-6 gap-2 flex flex-col items-center justify-center w-full">

        	<form id="searchForm" class="flex items-center border gap-2 bg-white border-gray-500/30 h-12 max-w-md w-full rounded-full overflow-hidden">
			    <input type="text" name="phone" id="phone" placeholder="Số điện thoại của bạn" class="w-full h-full pl-6 outline-none text-sm placeholder-gray-500" required>
			    <button type="submit" class="bg-indigo-500 active:scale-95 transition w-56 h-10 rounded-full text-sm text-white mr-1 flex items-center justify-center gap-1">
			        Tìm kiếm <i class="ti ti-arrow-narrow-right"></i>
			    </button>
			</form>

			<div id="orderResult" class="w-full max-w-3xl mt-6"></div>

        </div>
		
	</div>
</section>

@push('scripts')
	<script>
		$(document).ready(function () {

		    $('#searchForm').on('submit', function(e) {
		        e.preventDefault();

		        let phone = $('#phone').val().trim();

		        if (!phone) {
		            alert('Vui lòng nhập số điện thoại');
		            return;
		        }

		        $('#orderResult').html('<p class="text-center text-gray-500">Đang tìm kiếm...</p>');

		        $.ajax({
		            url: "{{ route('index.order') }}",
		            method: "GET",
		            data: { phone: phone },

		            success: function(res) {

		                if (!res.data || res.data.length === 0) {
		                    $('#orderResult').html(`
		                        <div class="text-center text-gray-500 py-6">
		                            Không tìm thấy khóa học nào
		                        </div>
		                    `);
		                    return;
		                }

		                let html = '';

		                res.data.forEach(order => {
						    html += `
						        <div class="bg-white border border-gray-200 rounded-2xl p-4 shadow-sm hover:shadow-md transition">

						            <!-- Header -->
						            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-3">
						                <h3 class="font-semibold text-gray-800 text-base md:text-lg line-clamp-1">
						                    ${order?.course}
						                </h3>
						                <span class="text-xs md:text-sm text-indigo-600 font-medium">
						                    ${order?.paid_at}
						                </span>
						            </div>

						            <!-- Info Grid -->
						            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mb-3 text-sm">
						                <div>
						                    <span class="text-gray-600">Mã thanh toán:</span>
						                    <span class="font-medium text-gray-800">${order?.code}</span>
						                </div>
						                <div>
						                    <span class="text-gray-600">Ngày đăng ký:</span>
						                    <span class="font-medium text-gray-800">${order?.created_at}</span>
						                </div>
						            </div>

						            <!-- Divider -->
						            <div class="border-t my-3"></div>

						            <!-- Footer -->
						            <div class="flex items-center justify-between">
						                <span class="text-xs text-gray-600">Tổng thanh toán</span>
						                <span class="text-lg font-bold text-indigo-600">
						                    ${order?.price_format} VNĐ
						                </span>
						            </div>

						    		<div class="flex justify-center ${order?.paid_at == 'Đã thanh toán' ? 'hidden' : ''}">
						    			<img src="https://api.vietqr.io/image/${order?.bank_code}-${order?.account_number}-Olvjj43.jpg?accountName=${order?.account_owner}&amount=${order?.price}&addInfo=CME%20${order?.code}%20TT" width="400px">
						    		</div>
						    		
						        </div>
						    `;
						});

		                $('#orderResult').html(html);
		            },

		            error: function() {
		                $('#orderResult').html(`
		                    <div class="text-center text-red-500 py-6">
		                        Có lỗi xảy ra, vui lòng thử lại
		                    </div>
		                `);
		            }
		        });
		    });

		});
		</script>
@endpush

@endsection