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
        $order->paid_at = $request->paid_at == 1 ? now() : null;

        if($order->save()) {
            return back()->with('success', 'Lưu thành công');
        }
        
        return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');
    }
}
