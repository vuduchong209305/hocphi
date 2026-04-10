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

        if (!empty($request->opening_select)) {

            [$code, $start_date] = explode('|', $request->opening_select);

            $opening = Opening::where('code', $code)->where('start_date', $start_date)->first();

            if ($opening) {
                $order->class_code = $opening->code;
                $order->start_date = $opening->start_date;
            }
        }

        $order->code = generateCode(10);
        $order->fullname = $request->fullname;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->company = $request->company;
        $order->cccd = $request->cccd;
        $order->birthday = $request->birthday;
        $order->course_id = $request->course_id;
        $order->price = $course->price;

        $order->gender = $request->gender;
        $order->birthplace = $request->birthplace;
        $order->address = $request->address;
        $order->address_cme = $request->address_cme;
        $order->education = $request->education;
        $order->graduate_year = $request->graduate_year;
        $order->graduate_address = $request->graduate_address;
        

        $order->cccd_front = HTMLHelper::uploadImage('cccd_front');
        $order->cccd_back = HTMLHelper::uploadImage('cccd_back');
        $order->degree = HTMLHelper::uploadImage('degree');
        $order->signature = HTMLHelper::uploadImage('signature');

        if ($request->boolean('is_vat')) {
            $order->is_vat = $request->boolean('is_vat');
            $order->mst = $request->mst;
            $order->mst_name = $request->mst_name;
            $order->mst_address = $request->mst_address;
        }

        if($order->save()) {
            \Mail::to($order->email)->cc(mail_cc())->queue(new \App\Mail\RegisterCourse($order));
            return sendResponse($order, 'Đăng ký thành công');
        }

        return sendError('Có lỗi xảy ra');
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
                'paid_at' => $item->paid_at,
                'paid_at_text' => $item->paid_at ? "Đã thanh toán: {$item->paid_at}" : 'Chưa thanh toán',
                'course' => $item->course->title ?? null,
                'class_code' => $item->class_code ?? null,
                'start_date' => $item->start_date ?? null,
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
                'code' => $item->code,
                'start_date' => $item->start_date,
            ];
        });

        return sendResponse($data);
    }

    public function mst(Request $request)
    {

    }

    public function page404()
    {
        return view('index.404');
    }
}
