<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Course;
use App\Models\Education;
use App\Models\Admin;
use App\Models\Status;
use App\Exports\OrdersExport;
use App\Helpers\HTMLHelper;
use Barryvdh\DomPDF\Facade\Pdf;
use Excel, Storage;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $this->html['admins'] = Admin::get();
        $this->html['courses'] = Course::orderBy('title')->get();
        $this->html['status'] = Status::get();
        $this->html['orders'] = Order::keyword($request->q)
                                ->course($request->course_id)
                                ->paid($request->paid_at)
                                ->status($request->status_id)
                                ->assignedTo($request->assigned_to)
                                ->latest()->paginate();

        return view('admin.order.index', $this->html);
    }

    public function create(Request $request)
    {
        $this->html['data'] = Order::findOrFail($request->id);
        $this->html['educations'] = Education::get();
        $this->html['admins'] = Admin::get();
        return view('admin.order.create', $this->html);
    }

    public function store(Request $request, Order $order)
    {
        if(!empty($request->id))
            $order = Order::findOrFail($request->id);

        $order->fullname = $request->fullname;
        $order->company  = $request->company;
        $order->email    = $request->email;
        $order->phone    = $request->phone;
        $order->birthday = $request->birthday;

        $order->cccd = $request->cccd;
        $order->gender = $request->gender;
        $order->birthplace = $request->birthplace;
        $order->address = $request->address;
        $order->address_cme = $request->address_cme;
        $order->graduate_year = $request->graduate_year;
        $order->graduate_address = $request->graduate_address;
        $order->education = $request->education;
        $order->price = $request->price;
        $order->class_code = $request->class_code;
        $order->start_date = $request->start_date;
        $order->assigned_to = $request->assigned_to;
        
        $order->paid_at = $request->paid_at == 1 ? now() : null;

        $order->cccd_front = HTMLHelper::updateImage($order->cccd_front, 'cccd_front');
        $order->cccd_back = HTMLHelper::updateImage($order->cccd_back, 'cccd_back');
        $order->degree = HTMLHelper::updateImage($order->degree, 'degree');
        $order->signature = HTMLHelper::updateImage($order->signature, 'signature');

        if($order->save()) {
            return back()->with('success', 'Lưu thành công');
        }
        
        return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');
    }

    public function update(Request $request)
    {
        Order::where(['id' => $request->pk])->update([$request->name => $request->value]);
        return sendResponse($request->pk, 'Cập nhật thành công');
    }

    public function mail(Request $request)
    {
        $order = Order::findOrFail($request->id);
        \Mail::to($order->email)->cc(mail_cc())->queue(new \App\Mail\RegisterCourse($order));

        return sendResponse($order, 'Gửi mail thành công');
    }

    public function pdf(Request $request)
    {
        $order = Order::findOrFail($request->id);

        $pdf = Pdf::loadView('admin.pdf', compact('order'))
                    ->setPaper('a4', 'portrait')
                    ->setOptions([
                        'defaultFont' => 'DejaVu Sans',
                        'isRemoteEnabled' => true,
                        'isHtml5ParserEnabled' => true,
                    ]);

        return $pdf->download('dang-ky-'.$order->code.'-'.time().'.pdf');
    }

    public function preview(Request $request)
    {
        return view('admin.pdf');
    }

    public function export(Request $request)
    {
        $course_id = $request->course_id;
        $paid_at   = $request->paid_at;
        $q         = $request->q;

        $folder = 'export/' . date('Y/m/d');

        // Tạo folder nếu chưa tồn tại
        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }

        $fileName = 'orders_' . time() . '.xlsx';

        $filePath = $folder . '/' . $fileName;

        Excel::store(new OrdersExport($course_id, $paid_at, $q), $filePath, 'public');

        $url = Storage::disk('public')->url($filePath);

        return sendResponse($url);
    }

    public function delete(Request $request)
    {
        $listID = $request->get('id');

        if (empty($listID)) {
            return back()->withErrors('Không có ID');
        }

        $ids = array_filter(explode(';', $listID));

        if (empty($ids)) {
            return back()->withErrors('Không có ID hợp lệ');
        }

        try {

            $orders = Order::whereIn('id', $ids)->get();

            foreach ($orders as $order) {

                $files = [
                    $order->cccd_front,
                    $order->cccd_back,
                    $order->degree,
                    $order->signature,
                ];

                foreach ($files as $file) {
                    if (!empty($file) && Storage::disk('public')->exists($file)) {
                        Storage::disk('public')->delete($file);
                    }
                }
            }

            $deleted = Order::whereIn('id', $ids)->delete();

            return $deleted
                ? back()->with('success', "Xóa thành công {$deleted} dữ liệu")
                : back()->withErrors('Không có dữ liệu để xóa');

        } catch (\Exception $e) {

            return back()->withErrors('Lỗi: ' . $e->getMessage());
        }
    }

    public function status()
    {
        return Status::select('id as value', 'name as text')->orderBy('name')->get();
    }
}
