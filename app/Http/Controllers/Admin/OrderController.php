<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Course;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $this->html['courses'] = Course::get();
        $this->html['orders'] = Order::keyword($request->q)->course($request->course_id)->paid($request->paid_at)->latest()->paginate();
        return view('admin.order.index', $this->html);
    }

    public function create(Request $request)
    {
        $this->html['data'] = Order::findOrFail($request->id);
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
        
        $order->paid_at = $request->paid_at == 1 ? now() : null;

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
}
