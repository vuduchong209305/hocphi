@extends('index.layout') 
@section('title', 'Trang Chủ') 
@section('content')

<section class="py-20 bg-white" id="dang-ky-khoa-hoc">
    <div class="flex flex-col items-center justify-center w-full">
        <h2 class="text-3xl font-bold mb-4">Đăng ký khóa học</h2>
        <p class="text-gray-500 mb-10">Vui lòng nhập đầy đủ các thông tin bên dưới</p>
        <div class="max-w-7xl mx-auto px-3 md:gap-6 gap-2 w-full">
            
            <form method="post" action="#" id="registerForm" class="mb-10" enctype="multipart/form-data">

                <div class="mb-2">
                    <label class="block font-semibold text-gray-900 mb-1">
                        Khoá học anh/chị cần đăng ký <span class="text-red-500 italic text-sm">(Bắt buộc)</span>
                    </label>
                    <select name="course_id" id="course_id" class="tomSelect w-full focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 text-sm" placeholder="Chọn khóa học" required>
                        <option value="">Lựa chọn</option>
                        @if(!empty($course) && $course->count() > 0)
                            @foreach($course as $item)
                                <option value="{{ $item->id ?? null }}">{{ $item->title ?? null }} - ({{ !empty($item->price) ? vdh_format_money($item->price) . ' đ' : null }})</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div id="opening-list" class="mb-10"></div>

                <div class="grid md:grid-cols-2 md:gap-4 grid-cols-1 gap-3 mb-5 border border-dashed border-gray-400 rounded p-3">
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="fullname">Họ tên <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="text" placeholder="Nguyễn Văn A" name="fullname" id="fullname" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required/>
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="phone">Số điện thoại <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="text" placeholder="098xxxxxxx" name="phone" id="phone" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required/>  
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="email">Email <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="email" placeholder="nguyenvana@gmail.com" name="email" id="email" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required/>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="gender">Giới tính <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <select name="gender" id="gender" required class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors">
                            <option value="">Lựa chọn</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="company">Đơn vị công tác <span class="italic text-sm">(Không bắt buộc)</span></label>
                        <input type="text" placeholder="Đơn vị công tác" name="company" id="company" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />  
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="cccd">Căn cước công dân (12 số) <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="text" placeholder="022 xxx xxx xxx" name="cccd" id="cccd" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="birthday">Ngày tháng năm sinh <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="text" placeholder="dd-mm-yyyy" name="birthday" id="birthday" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required/>  
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="birthplace">Nơi sinh <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="text" placeholder="Nơi sinh" name="birthplace" id="birthplace" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required />  
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="address">Địa chỉ trên CCCD/VNEID (Sau sát nhập) <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="text" placeholder="Địa chỉ trên CCCD/VNEID" name="address" id="address" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required />
                    </div>
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="address_cme">Địa chỉ nhận CME (Trước sát nhập) <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="text" placeholder="Địa chỉ nhận CME" name="address_cme" id="address_cme" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required />
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="education">Trình độ chuyên môn <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <select name="education" id="education" required class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors">
                            <option value="">Lựa chọn</option>
                            @foreach($educations as $education)
                                <option value="{{ $education->id ?? null }}">{{ $education->title ?? null }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="graduate_year">Năm tốt nghiệp <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="number" placeholder="Năm tốt nghiệp" name="graduate_year" id="graduate_year" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required />
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="graduate_address">Nơi tốt nghiệp <span class="text-red-500 italic text-sm">(Bắt buộc)</span></label>
                        <input type="text" placeholder="Nơi tốt nghiệp" name="graduate_address" id="graduate_address" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" required />
                    </div>
                </div>

                <div class="flex items-center gap-2 mb-3">
                    <input type="checkbox" id="is_vat" name="is_vat" class="w-5 h-5 cursor-pointer accent-indigo-500 rounded-[5px] text-gray-300" />
                    <label class="text-sm text-gray-500 cursor-pointer" for="is_vat">
                        Yêu cầu xuất hóa đơn
                    </label>
                </div>

                <div id="vat-form" class="hidden grid md:grid-cols-2 md:gap-4 grid-cols-1 gap-3 mb-10 border border-dashed border-gray-400 rounded p-3 transition-all duration-300 ease-in-out">
                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="mst">Mã số thuế</label>
                        <input type="text" placeholder="Mã số thuế" name="mst" id="mst" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="mst_name">Tên đơn vị</label>
                        <input type="text" placeholder="Tên đơn vị" name="mst_name" id="mst_name" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="mst_address">Địa chỉ đơn vị</label>
                        <input type="text" placeholder="Địa chỉ đơn vị" name="mst_address" id="mst_address" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-900 mb-1" for="relation_code">Mã quan hệ ngân sách (Không bắt buộc / Dành cho các đơn vị công lập)</label>
                        <input type="text" placeholder="Mã quan hệ ngân sách" name="relation_code" id="relation_code" class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm outline-none focus:border-indigo-500 transition-colors" />
                    </div>
                </div>

                <!-- Upload Section -->
                <div class="mb-5">
                    <label class="block font-semibold text-gray-900 mb-3">
                        Tải lên giấy tờ <span class="text-red-500 italic text-sm">(Bắt buộc)</span> <i>(tất cả thông tin được Viện Khoa học Quản lý Y tế cam kết bảo mật)</i>
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

                <button type="submit" class="w-full py-3.5 bg-blue-500 border border-gray-300 text-white rounded-lg cursor-pointer active:scale-95 transition-all" >
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

                if(course_id == null || course_id == '') {
                    showToast('error', 'Vui lòng chọn', 'Khóa học đăng ký')
                    return
                }

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

                form.find('.input-file').each(function () {
                    if (!this.files.length) {
                        $(this).closest('.upload-box').addClass('border-red-500');
                        showToast('error', 'Vui lòng nhập', $(this).attr('data-name'))
                        return
                    }
                });

                if (!form.find('#checkbox').is(':checked')) {
                    showToast('error', 'Vui lòng nhập', 'Bạn phải đồng ý với điều khoản')
                    return
                }

                // ===== SUBMIT AJAX =====
                let formData = new FormData(this);

                Swal.fire({
                    title: "Xác nhận thông tin",
                    text: "Bạn chắc chắn với tất cả các thông tin là chính xác",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Đăng ký",
                    cancelButtonText: "Đóng"
                }).then((result) => {
                    if (result.isConfirmed) {
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
                                    Swal.fire({
                                        title: "Thành công",
                                        text: res.message,
                                        icon: "success"
                                    });

                                    form[0].reset();

                                    $('.preview').addClass('hidden');
                                    $('.placeholder').removeClass('hidden');
                                } else {
                                    showToast('error', 'Không hợp lệ', res.message)
                                }
                            },
                            error: function (xhr) {
                                showToast('error', 'Có lỗi xảy ra', 'Vui lòng thử lại')
                            },
                            complete: function () {
                                form.find('button[type="submit"]').prop('disabled', false).text('Đăng ký');
                            }
                        });
                    }  
                });

            });

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

    <script>
        const birthdayInput = document.getElementById('birthday');

        birthdayInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // chỉ lấy số

            // giới hạn 8 số (ddmmyyyy)
            value = value.substring(0, 8);

            let formatted = '';

            if (value.length > 0) {
                formatted = value.substring(0, 2);
            }
            if (value.length >= 3) {
                formatted += '-' + value.substring(2, 4);
            }
            if (value.length >= 5) {
                formatted += '-' + value.substring(4, 8);
            }

            e.target.value = formatted;
        });
    </script>

    <script>
        $(document).ready(function () {

            $('#course_id').on('change', function () {
                let courseId = $(this).val();

                if (!courseId) {
                    $('#opening-list').html('');
                    return;
                }

                $('#opening-list').html('<p class="text-gray-500">Đang tải lớp học...</p>');

                $.ajax({
                    url: "{{ route('index.opening') }}",
                    method: "GET",
                    data: { course_id: courseId },

                    success: function (res) {

                        if (!res.data || res.data.length === 0) {
                            $('#opening-list').html('<p class="text-gray-500">Chưa có lịch khai giảng</p>');
                            return;
                        }

                        let html = `
                            <label class="block font-semibold text-gray-900 mb-1">
                                Chọn lớp học <span class="text-red-500 italic text-sm">(Bắt buộc)</span>
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        `;

                        res.data.forEach(item => {
                            html += `
                                <label class="border border-gray-300 rounded p-3 flex items-center gap-3 cursor-pointer hover:border-indigo-500 transition">

                                    <input type="radio" name="opening_select" value="${item.code}|${item.start_date}" class="w-4 h-4 accent-indigo-500" required>

                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-700">
                                            Khai giảng: ${item.start_date}
                                        </span>
                                    </div>

                                </label>
                            `;
                        });

                        html += `</div>`;

                        $('#opening-list').html(html);
                    },

                    error: function () {
                        $('#opening-list').html('<p class="text-red-500">Có lỗi xảy ra</p>');
                    }
                });
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $('#is_vat').on('change', function () {
                let isChecked = $(this).is(':checked');

                $('#vat-form').toggleClass('hidden', !isChecked);
                $('#vat-form').find('input').prop('disabled', !isChecked);

                if (!isChecked) {
                    $('#vat-form').find('input').val('');
                }
            });

        });
    </script>
@endpush
@endsection