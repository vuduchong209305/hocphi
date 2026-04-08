@extends('index.layout') 
@section('title', 'Trang Chủ') 
@section('content')

<section class="py-20 bg-white">
    <div class="flex flex-col items-center justify-center w-full">
        <h2 class="text-3xl font-bold mb-4">Đăng ký khóa học</h2>
        <p class="text-gray-500 mb-10">Vui lòng nhập đầy đủ các thông tin bên dưới</p>
        <div class="max-w-7xl mx-auto px-3 md:gap-6 gap-2 w-full">
            
            <form method="post" action="#" id="registerForm" class="mb-10" enctype="multipart/form-data">
                <div class="grid md:grid-cols-2 md:gap-4 grid-cols-1 gap-2 mb-10 border border-dashed rounded p-3">
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="fullname">Họ tên <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="Nguyễn Văn A" name="fullname" id="fullname" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="phone">Số điện thoại <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="098xxxxxxx" name="phone" id="phone" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />  
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="email">Email <span class="text-red-500">*</span></label>
                        <input type="email" placeholder="nguyenvana@gmail.com" name="email" id="email" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="company">Đơn vị công tác <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="Đơn vị công tác" name="company" id="company" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />  
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="cccd">Căn cước công dân (12 số) <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="022 xxx xxx xxx" name="cccd" id="cccd" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="birthday">Ngày tháng năm sinh <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="dd-mm-yyyy" name="birthday" id="birthday" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />  
                    </div>
                </div>

                <div class="mb-10">
                    <label class="block font-semibold text-gray-900 mb-1">
                        Khoá học anh chị cần đăng ký <span class="text-red-500">*</span>
                    </label>
                    <select name="course_id" id="course_id" class="tomSelect w-full focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-sm" placeholder="Chọn khóa học">
                        <option value="">Lựa chọn</option>
                        @if(!empty($course) && $course->count() > 0)
                            @foreach($course as $item)
                                <option value="{{ $item->id ?? null }}">{{ $item->title ?? null }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>  

                <!-- Upload Section -->
                <div class="mb-5">
                    <label class="block font-semibold text-gray-900 mb-3">
                        Tải lên giấy tờ <span class="text-red-500">*</span> <i>(tất cả thông tin được Viện Khoa học Quản lý Y tế cam kết bảo mật)</i>
                    </label>

                    <div class="grid md:grid-cols-4 grid-cols-1 gap-4">

                        <!-- ITEM -->
                        <div class="upload-box group relative border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-indigo-500 transition cursor-pointer flex flex-col justify-center items-center">
                            <span class="text-sm mb-5">Ảnh CCCD mặt trước</span>
                            <input type="file" name="cccd_front" accept="image/*" class="hidden input-file" data-name="CCCD mặt trước">

                            <!-- Preview -->
                            <div class="preview hidden">
                                <img class="w-full h-40 object-cover rounded-lg mb-2" />
                                <div class="flex justify-center gap-2">
                                    <button type="button" class="change-btn text-xs px-3 py-1 bg-indigo-500 text-white rounded cursor-pointer">
                                        Thay ảnh
                                    </button>
                                    <button type="button" class="remove-btn text-xs px-3 py-1 bg-red-500 text-white rounded cursor-pointer">
                                        Xoá
                                    </button>
                                </div>
                            </div>

                            <!-- Placeholder -->
                            <div class="placeholder">
                                <div class="text-gray-400 text-4xl mb-2">📷</div>
                                <p class="text-sm text-gray-500">CCCD mặt trước</p>
                                <p class="text-xs text-gray-400 mt-1">Click để tải ảnh</p>
                            </div>
                        </div>

                        <!-- ITEM -->
                        <div class="upload-box group relative border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-indigo-500 transition cursor-pointer flex flex-col justify-center items-center">
                            <span class="text-sm mb-5">Ảnh CCCD mặt sau</span>
                            <input type="file" name="cccd_back" accept="image/*" class="hidden input-file" data-name="CCCD mặt sau">

                            <div class="preview hidden">
                                <img class="w-full h-40 object-cover rounded-lg mb-2" />
                                <div class="flex justify-center gap-2">
                                    <button type="button" class="change-btn text-xs px-3 py-1 bg-indigo-500 text-white rounded cursor-pointer">
                                        Thay ảnh
                                    </button>
                                    <button type="button" class="remove-btn text-xs px-3 py-1 bg-red-500 text-white rounded cursor-pointer">
                                        Xoá
                                    </button>
                                </div>
                            </div>

                            <div class="placeholder">
                                <div class="text-gray-400 text-4xl mb-2">📷</div>
                                <p class="text-sm text-gray-500">CCCD mặt sau</p>
                                <p class="text-xs text-gray-400 mt-1">Click để tải ảnh</p>
                            </div>
                        </div>

                        <!-- ITEM -->
                        <div class="upload-box group relative border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-indigo-500 transition cursor-pointer flex flex-col justify-center items-center">
                            <span class="text-sm mb-5">Ảnh bằng cấp cao nhất</span>
                            <input type="file" name="degree" accept="image/*" class="hidden input-file" data-name="Ảnh bằng cấp cao nhất">

                            <div class="preview hidden">
                                <img class="w-full h-40 object-cover rounded-lg mb-2" />
                                <div class="flex justify-center gap-2">
                                    <button type="button" class="change-btn text-xs px-3 py-1 bg-indigo-500 text-white rounded cursor-pointer">
                                        Thay ảnh
                                    </button>
                                    <button type="button" class="remove-btn text-xs px-3 py-1 bg-red-500 text-white rounded cursor-pointer">
                                        Xoá
                                    </button>
                                </div>
                            </div>

                            <div class="placeholder">
                                <div class="text-gray-400 text-4xl mb-2">📷</div>
                                <p class="text-sm text-gray-500">Bằng cấp</p>
                                <p class="text-xs text-gray-400 mt-1">Click để tải ảnh</p>
                            </div>
                        </div>

                        <!-- ITEM -->
                        <div class="upload-box group relative border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-indigo-500 transition cursor-pointer flex flex-col justify-center items-center">
                            <span class="text-sm mb-5">Ảnh chữ ký</span>
                            <input type="file" name="signature" accept="image/*" class="hidden input-file" data-name="Ảnh chữ ký">

                            <div class="preview hidden">
                                <img class="w-full h-40 object-cover rounded-lg mb-2" />
                                <div class="flex justify-center gap-2">
                                    <button type="button" class="change-btn text-xs px-3 py-1 bg-indigo-500 text-white rounded cursor-pointer">
                                        Thay ảnh
                                    </button>
                                    <button type="button" class="remove-btn text-xs px-3 py-1 bg-red-500 text-white rounded cursor-pointer">
                                        Xoá
                                    </button>
                                </div>
                            </div>

                            <div class="placeholder">
                                <div class="text-gray-400 text-4xl mb-2">📷</div>
                                <p class="text-sm text-gray-500">Ảnh chữ ký</p>
                                <p class="text-xs text-gray-400 mt-1">Click để tải ảnh</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="flex items-center gap-2 mb-6">
                    <input type="checkbox" id="checkbox" class="w-5 h-5 cursor-pointer accent-indigo-500 rounded-[5px] text-gray-300" />
                    <label class="text-sm text-gray-500 cursor-pointer" for="checkbox">
                        Tôi đồng ý xác nhận các nội dung đăng ký
                    </label>
                </div>

                <button type="submit" class="w-full py-3.5 bg-linear-to-br from-indigo-500 to-purple-600 text-white rounded-lg cursor-pointer transition-all hover:-translate-y-0.5 hover:shadow-[0_10px_20px_rgba(99,102,241,0.3)]" >
                    Đăng ký
                </button>
            </form>

            <div class="text-center">
                <a href="{{ route('index.purchase') }}" class="italic underline">Thanh toán khóa học đã đăng ký</a>
            </div>
            
        </div>
    </div>
</section>

@push('scripts')
<script>
    var typed = document.getElementById("typed");
    if(typed) {
        @php
        $typed_content = explode("\n", HTMLHelper::getOptionLang('hero_typed'));
        @endphp
        var typedStrings = @json($typed_content);
        new Typed('#typed', {
            strings: typedStrings.map(t => `<strong>${t}</strong>`),
            typeSpeed: 80,
            backSpeed: 20,
            backDelay: 1500,
            smartBackspace: true,
            loop: true,
            cursorChar: '<span class="text-indigo-700">|</span>'
        });
    }
</script>

<script>
    document.querySelectorAll('.upload-box').forEach(box => {
        const input = box.querySelector('.input-file');
        const preview = box.querySelector('.preview');
        const placeholder = box.querySelector('.placeholder');
        const img = box.querySelector('img');

        // click box -> open file
        box.addEventListener('click', (e) => {
            if (e.target.classList.contains('change-btn') || e.target.classList.contains('remove-btn')) return;
            input.click();
        });

        // chọn ảnh
        input.addEventListener('change', (e) => {
            const file = e.target.files[0];
            if (!file) return;

            const url = URL.createObjectURL(file);
            img.src = url;

            preview.classList.remove('hidden');
            placeholder.classList.add('hidden');
        });

        // thay ảnh
        box.querySelector('.change-btn').addEventListener('click', () => {
            input.click();
        });

        // xoá ảnh
        box.querySelector('.remove-btn').addEventListener('click', () => {
            input.value = "";
            img.src = "";
            preview.classList.add('hidden');
            placeholder.classList.remove('hidden');
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        $('#registerForm').on('submit', function (e) {
            e.preventDefault();

            let form = $(this);
            let isValid = true;

            let fullname = $('#fullname').val().trim(),
                phone = $('#phone').val().trim(),
                email = $('#email').val().trim(),
                company = $('#company').val().trim(),
                cccd = $('#cccd').val().trim(),
                birthday = $('#birthday').val().trim(),
                course_id = $('#course_id :selected').val()

            if(fullname == null || fullname == '') {
                showToast('error', 'Vui lòng nhập', 'Họ tên không để trống')
                return
            }

            if(phone == null || phone == '') {
                showToast('error', 'Vui lòng nhập', 'Số điện thoại')
                return
            }

            if(email == null || email == '' || !validateEmail(email)) {
                showToast('error', 'Vui lòng nhập', 'Email hợp lệ')
                return
            }

            if(company == null || company == '') {
                showToast('error', 'Vui lòng nhập', 'Đơn vị công tác')
                return
            }

            if(cccd == null || cccd == '' || cccd.length != 12) {
                showToast('error', 'Vui lòng nhập', 'Căn cước công dân hợp lệ 12 số')
                return
            }

            if(birthday == null || birthday == '') {
                showToast('error', 'Vui lòng nhập', 'Ngày tháng năm sinh')
                return
            }

            if(course_id == null || course_id == '') {
                showToast('error', 'Vui lòng chọn', 'Khóa học đăng ký')
                return
            }

            form.find('.input-file').each(function () {
                if (!this.files.length) {
                    $(this).closest('.upload-box').addClass('border-red-500');
                    showToast('error', 'Vui lòng nhập', $(this).attr('data-name'))
                    return
                }
            });

            if (!form.find('input[type="checkbox"]').is(':checked')) {
                showToast('error', 'Vui lòng nhập', 'Bạn phải đồng ý với điều khoản')
                return
            }

            // ===== SUBMIT AJAX =====
            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('index.register') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    form.find('button[type="submit"]').prop('disabled', true).text('Đang gửi...');
                },
                success: function (res) {
                    if(res.status) {
                        showToast('success', 'Thành công', res.message)
                        form[0].reset();

                        $('.preview').addClass('hidden');
                        $('.placeholder').removeClass('hidden');
                    }
                },
                error: function (xhr) {
                    showToast('error', 'Có lỗi xảy ra', 'Vui lòng thử lại')
                },
                complete: function () {
                    form.find('button[type="submit"]').prop('disabled', false).text('Đăng ký');
                }
            });

        });

        // ===== FUNCTION HIỂN THỊ LỖI =====
        function showError(input, message) {
            input.addClass('border-red-500');
            input.after('<p class="text-red-500 text-xs mt-1 error-text">' + message + '</p>');
        }

    });
</script>

<script>
    const input = document.getElementById('fullname');

    input.addEventListener('input', function(e) {
        let start = this.selectionStart;

        let words = this.value.toLowerCase().split(' ');
        words = words.map(w => w ? w[0].toUpperCase() + w.slice(1) : '');
        this.value = words.join(' ');

        this.setSelectionRange(start, start);
    });
</script>
@endpush
@endsection