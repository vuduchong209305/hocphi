<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Course;
use App\Models\Opening;
use App\Helpers\HTMLHelper;
use Str;

class HomeController extends BaseController
{
    public function index()
    {
        $this->html['course'] = Course::status()->orderBy('sort', 'ASC')->get();
        return view('index.home', $this->html);
    }

    public function register(Request $request, Order $order)
    {
        $request->validate([
            'fullname' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'cccd' => 'required',
            'birthday' => 'required',
            'course_id' => 'required',
            'gender' => 'required',
            'birthplace' => 'required',
            'address' => 'required',
            'address_cme' => 'required',
            'education' => 'required',
            'graduate_year' => 'required',
            'graduate_address' => 'required',

            'cccd_front' => 'required|image',
            'cccd_back' => 'required|image',
            'degree' => 'required|image',
            'signature' => 'required|image',
        ]);

        if(Order::where(['phone' => $request->phone, 'email' => $request->email, 'course_id' => $request->course_id])->exists()) {
            return sendError("Email {$request->email} và số điện thoại {$request->phone} đã đăng ký lớp học này");
        }

        $course = Course::findOrFail($request->course_id);

        $order->code = generateCode(10);
        $order->fullname = $request->fullname;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->company = $request->company;
        $order->cccd = $request->cccd;
        $order->birthday = $request->birthday;
        $order->course_id = $request->course_id;
        $order->price = $course->price;

        $order->cccd_front = HTMLHelper::uploadImage('cccd_front');
        $order->cccd_back = HTMLHelper::uploadImage('cccd_back');
        $order->degree = HTMLHelper::uploadImage('degree');
        $order->signature = HTMLHelper::uploadImage('signature');
        $order->save();

        return sendResponse($order, 'Đăng ký thành công');
    }

    public function purchase(Request $request)
    {
        return view('index.purchase');
    }

    public function order(Request $request)
    {
        $phone = $request->phone;
        $orders = Order::where('phone', $phone)->latest()->get();

        $data = $orders->map(function ($item) {
            return [
                'code' => $item->code,
                'paid_at' => $item->paid_at ? "Đã thanh toán: {$item->paid_at}" : 'Chưa thanh toán',
                'course' => $item->course->title ?? '',
                'price' => $item->price,
                'price_format' => vdh_format_money($item->price),
                'bank_code' => HTMLHelper::getOption('bank_code'),
                'account_number' => HTMLHelper::getOption('account_number'),
                'account_owner' => HTMLHelper::getOption('account_owner'),
                'created_at' => $item->created_at->format('d/m/Y'),
            ];
        });

        return sendResponse($data);
    
    }

    public function opening(Request $request)
    {
        $openings = Opening::where('course_id', $request->course_id)->orderBy('start_date')->get();

        $data = $openings->map(function ($item) {
            return [
                'id' => $item->id,
                'code' => $item->code,
                'start_date' => $item->start_date,
            ];
        });

        return sendResponse($data);
    }

    public function page404()
    {
        return view('index.404');
    }
}
