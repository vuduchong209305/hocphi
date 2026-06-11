<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Course;
use App\Models\Opening;
use App\Models\Education;
use App\Helpers\HTMLHelper;
use Str;

class HomeController extends BaseController
{
    public function index()
    {
        $this->html['course'] = Course::status()->orderBy('title')->get();
        $this->html['educations'] = Education::get();
        return view('index.home', $this->html);
    }

    public function register(Request $request, Order $order)
    {
        $validator = \Validator::make($request->all(), [
            'fullname'          => ['required', 'string', 'max:255'],
            'phone'             => ['required', 'string', 'max:20'],
            'email'             => ['required', 'email'],
            'cccd'              => ['required', 'string', 'max:20'],
            'birthday'          => ['required', 'date'],
            'course_id'         => ['required'],
            'gender'            => ['required'],
            'birthplace'        => ['required', 'string'],
            'address'           => ['required', 'string'],
            'address_cme'       => ['required', 'string'],
            'education'         => ['required', 'string'],
            'graduate_year'     => ['required', 'digits:4'],
            'graduate_address'  => ['required', 'string'],

            'cccd_front'        => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'cccd_back'         => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'degree'            => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'signature'         => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ], [
            'fullname.required'         => 'Vui lòng nhập họ và tên.',
            'phone.required'            => 'Vui lòng nhập số điện thoại.',
            'email.required'            => 'Vui lòng nhập email.',
            'email.email'               => 'Email không đúng định dạng.',
            'cccd.required'             => 'Vui lòng nhập số CCCD.',
            'birthday.required'         => 'Vui lòng chọn ngày sinh.',
            'birthday.date'             => 'Ngày sinh không hợp lệ.',
            'course_id.required'        => 'Vui lòng chọn khóa học.',
            'gender.required'           => 'Vui lòng chọn giới tính.',
            'birthplace.required'       => 'Vui lòng nhập nơi sinh.',
            'address.required'          => 'Vui lòng nhập địa chỉ.',
            'address_cme.required'      => 'Vui lòng nhập địa chỉ nhận chứng chỉ.',
            'education.required'        => 'Vui lòng nhập trình độ học vấn.',
            'graduate_year.required'    => 'Vui lòng nhập năm tốt nghiệp.',
            'graduate_year.digits'      => 'Năm tốt nghiệp không hợp lệ.',
            'graduate_address.required' => 'Vui lòng nhập nơi tốt nghiệp.',

            'cccd_front.required'       => 'Vui lòng tải ảnh CCCD mặt trước.',
            'cccd_front.image'          => 'CCCD mặt trước phải là hình ảnh.',
            'cccd_front.mimes'          => 'CCCD mặt trước chỉ hỗ trợ JPG, PNG, WEBP.',
            'cccd_front.max'            => 'CCCD mặt trước tối đa 5MB.',

            'cccd_back.required'        => 'Vui lòng tải ảnh CCCD mặt sau.',
            'cccd_back.image'           => 'CCCD mặt sau phải là hình ảnh.',
            'cccd_back.mimes'           => 'CCCD mặt sau chỉ hỗ trợ JPG, PNG, WEBP.',
            'cccd_back.max'             => 'CCCD mặt sau tối đa 5MB.',

            'degree.required'           => 'Vui lòng tải ảnh bằng cấp.',
            'degree.image'              => 'Bằng cấp phải là hình ảnh.',
            'degree.mimes'              => 'Bằng cấp chỉ hỗ trợ JPG, PNG, WEBP.',
            'degree.max'                => 'Bằng cấp tối đa 5MB.',

            'signature.required'        => 'Vui lòng tải ảnh chữ ký.',
            'signature.image'           => 'Chữ ký phải là hình ảnh.',
            'signature.mimes'           => 'Chữ ký chỉ hỗ trợ JPG, PNG, WEBP.',
            'signature.max'             => 'Chữ ký tối đa 5MB.',
        ]);

        if ($validator->fails()) {
            return sendError($validator->errors()->first());
        }

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
            $order->relation_code = $request->relation_code;
        }

        if($order->save()) {
            \Mail::to($order->email)->cc(mail_cc())->queue(new \App\Mail\RegisterCourse($order));
            return sendResponse($order, 'Đăng ký thành công, vui lòng kiểm tra Email');
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
                'fullname' => $item->fullname,
                'phone' => $item->phone,
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
