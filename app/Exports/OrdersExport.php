<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles
{
    private $course_id, $paid_at, $q;

    public function __construct($course_id, $paid_at, $q)
    {
        $this->course_id = $course_id;
        $this->paid_at   = $paid_at;
        $this->q         = $q;
    }

    public function headings(): array
    {
        return [
            'Khóa học',
            'Mã lớp',
            'Ngày khai giảng',
            'Mã thanh toán',
            'Email',
            'Họ tên',
            'Số điện thoại',
            'Đơn vị công tác',
            'CCCD',
            'Năm sinh',
            'Nơi sinh',
            'Địa chỉ',
            'Địa chỉ nhận CME',
            'Năm tốt nghiệp',
            'Nơi tốt nghiệp',
            'Xuất hóa đơn',
            'MST',
            'Tên đơn vị',
            'Địa chỉ đơn vị'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
           1 => ['font' => ['bold' => true]],
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Order::query();

        if(!empty($this->course_id)) {
            $query = $query->where('course_id', $this->course_id);
        }

        if(isset($this->paid_at)) {
            $query = $paid_at == 1 ? $query->where('paid_at', $paid_at) : $query->whereNull('paid_at');
        }

        if(!empty($this->q)) {
            $query = $query->where('code', 'LIKE', "%$this->q%")
                        ->orWhere('fullname', 'LIKE', "%$this->q%")
                        ->orWhere('company', 'LIKE', "%$this->q%")
                        ->orWhere('email', 'LIKE', "%$this->q%")
                        ->orWhere('phone', 'LIKE', "%$this->q%")
                        ->orWhere('cccd', 'LIKE', "%$this->q%")
                        ->orWhere('birthday', 'LIKE', "%$this->q%")
                        ->orWhere('class_code', 'LIKE', "%$this->q%")
                        ->orWhere('start_date', 'LIKE', "%$this->q%")
                        ->orWhere('mst', 'LIKE', "%$this->q%")
                        ->orWhere('mst_name', 'LIKE', "%$this->q%")
                        ->orWhere('mst_address', 'LIKE', "%$this->q%")
                        ->orWhere('graduate_year', 'LIKE', "%$this->q%")
                        ->orWhere('graduate_address', 'LIKE', "%$this->q%");
        }

        $orders = $query->get();

        $data = [];

        foreach($orders as $order) {

            $data[] = [
                'Khóa học' => $order->course->title ?? null,
                'Mã lớp' => $order->class_code ?? null,
                'Ngày khai giảng' => $order->start_date ?? null,
                'Mã thanh toán' => $order->code ?? null,
                'Email' => $order->email ?? null,
                'Họ tên' => $order->fullname ?? null,
                'Số điện thoại' => $order->phone ?? null,
                'Đơn vị công tác' => $order->company ?? null,
                'CCCD' => $order->cccd ?? null,
                'Năm sinh' => $order->birthday ?? null,
                'Nơi sinh' => $order->birthplace ?? null,
                'Địa chỉ' => $order->address ?? null,
                'Địa chỉ nhận CME' => $order->address_cme ?? null,
                'Năm tốt nghiệp' => $order->graduate_year ?? null,
                'Nơi tốt nghiệp' => $order->graduate_address ?? null,
                'Xuất hóa đơn' => $order->is_vat == 1 ? 'Có' : null,
                'MST' => $order->mst ?? null,
                'Tên đơn vị' => $order->mst_name ?? null,
                'Địa chỉ đơn vị' => $order->mst_address ?? null,
            ];
        }

        return collect($data);
    }
}
