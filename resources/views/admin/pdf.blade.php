<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Phiếu đăng ký</title>

    <style>
        @page {
            margin: 22px 28px;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
            line-height: 1.55;
        }

        * {
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .header td {
            vertical-align: top;
        }

        .title {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin: 20px 0 25px;
            text-transform: uppercase;
        }

        .section {
            margin-bottom: 18px;
        }

        .info-line {
            margin: 4px 0;
        }

        .signature-box {
            width: 280px;
            margin-left: auto;
            text-align: center;
            margin-top: 25px;
            margin-bottom: 80px;
        }

        .attachment-table td {
            border: 1px solid #d1d5db;
            padding: 10px;
            vertical-align: middle;
        }

        .attachment-label {
            width: 28%;
            font-weight: bold;
            background: #f5f5f5;
        }

        .attachment-image {
            text-align: center;
        }

        .attachment-image img {
            max-width: 380px;
            max-height: 220px;
            width: auto;
            height: auto;
        }

        .note {
            font-size: 11px;
            font-style: italic;
            margin-top: 10px;
        }

    </style>
</head>
<body>

    <!-- HEADER -->
    <table class="header">
        <tr>
            <td width="70%">
                <strong>VIỆN KHOA HỌC QUẢN LÝ Y TẾ</strong><br>
                <strong>Phòng tuyển sinh</strong><br>
                2/1 Trần Quốc Hoàn – Cầu Giấy – Hà Nội<br>
                Điện thoại: 091.320.6810 – 086.201.6106<br>
                Email: daotaoycme@gmail.com<br>
                Website: www.daotaoykhoa.com
            </td>

            <td width="30%" align="right">
                <img src="{{ asset('assets/images/logo.png') }}" width="150">
            </td>
        </tr>
    </table>

    <!-- TITLE -->
    <div class="title">
        PHIẾU THÔNG TIN HỌC VIÊN
    </div>

    <!-- COURSE INFO -->
    <table class="section">
        <tr>
            <td><strong>Khóa học:</strong> {{ $order->course->title ?? null }}</td>
            <td><strong>Mã lớp:</strong> {{ $order->class_code ?? null }}</td>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Ngày khai giảng:</strong> {{ $order->start_date ?? null }}
            </td>
        </tr>
    </table>

    <div class="section" style="font-style: italic;">
        Để phục vụ cho việc làm chứng chỉ, chứng nhận sau khi kết thúc lớp học,
        đề nghị mỗi học viên khai đầy đủ và chính xác những thông tin sau:
    </div>

    <!-- STUDENT INFO -->
    <div class="section">
        <div class="info-line">1. Họ và tên: <strong>{{ strtoupper($order->fullname ?? null) }}</strong> — Giới tính: {{ !empty($order->gender) && $order->gender == 1 ? 'Nam' : 'Nữ' }}</div>
        <div class="info-line">2. Năm sinh: {{ $order->birthday ?? null }} — Nơi sinh: {{ $order->birthplace ?? null }}</div>
        <div class="info-line">3. Số CCCD: {{ $order->cccd ?? null }}</div>
        <div class="info-line">4. Địa chỉ trên CCCD/VNeID: {{ $order->address ?? null }}</div>
        <div class="info-line">5. Địa chỉ nhận CME: {{ $order->address_cme ?? null }}</div>
        <div class="info-line">6. Điện thoại: {{ $order->phone ?? null }} — Email: {{ $order->email ?? null }}</div>
        <div class="info-line">7. Đơn vị công tác: {{ $order->company ?? null }}</div>
        <div class="info-line">8. Trình độ chuyên môn: {{ $order->education ?? null }}</div>
        <div class="info-line">9. Năm tốt nghiệp: {{ $order->graduate_year ?? null }} — Tại: {{ $order->graduate_address ?? null }}</div>
        <div class="info-line">10. Xuất hóa đơn VAT: {{ !empty($order->is_vat) && $order->is_vat ? 'Có' : 'Không' }}</div>

        @if(!empty($order->is_vat))
            <div class="info-line">- Mã số thuế: {{ $order->mst ?? null }}</div>
            <div class="info-line">- Tên đơn vị: {{ $order->mst_name ?? null }}</div>
            <div class="info-line">- Địa chỉ đơn vị: {{ $order->mst_address ?? null }}</div>
        @endif
    </div>

    <!-- DECLARATION -->
    <div class="section" style="font-style: italic;">
        <strong>
            Tôi xin cam đoan những lời khai trên đây là hoàn toàn chính xác,
            nếu sai tôi xin chịu mọi trách nhiệm, tuân thủ mọi quy định của khóa học.
        </strong>
    </div>

    <!-- SIGNATURE -->
    <div class="signature-box">
        Ngày ...... tháng ...... năm ......<br><br>
        <strong>NGƯỜI KHAI KÝ VÀ GHI RÕ HỌ TÊN</strong>
    </div>

    <!-- NOTE -->
    <div class="note">
        *Lưu ý: Mục thông tin đơn vị công tác yêu cầu học viên ghi chính xác chữ viết hoa, viết thường và không viết tắt để căn cứ làm chứng chỉ/chứng nhận.
    </div>

    <!-- ATTACHMENTS -->
    <h3 style="margin-top:30px;">HỒ SƠ ĐÍNH KÈM</h3>

    <table class="attachment-table">

        <tr>
            <td class="attachment-label">Mặt trước CCCD</td>
            <td class="attachment-image">
                <img src="{{ !empty($order->cccd_front) ? viewImage($order->cccd_front) : null }}">
            </td>
        </tr>

        <tr>
            <td class="attachment-label">Mặt sau CCCD</td>
            <td class="attachment-image">
                <img src="{{ !empty($order->cccd_back) ? viewImage($order->cccd_back) : null }}">
            </td>
        </tr>

        <tr>
            <td class="attachment-label">Bằng cấp cao nhất</td>
            <td class="attachment-image">
                <img src="{{ !empty($order->degree) ? viewImage($order->degree) : null }}">
            </td>
        </tr>

        <tr>
            <td class="attachment-label">Chữ ký</td>
            <td class="attachment-image">
                <img src="{{ !empty($order->signature) ? viewImage($order->signature) : null }}">
            </td>
        </tr>

    </table>

</body>
</html>