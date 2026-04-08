<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $this->html['data'] = Course::orderBy('sort', 'ASC')->get();

        if(!empty($request->id))
            $this->html['course'] = Course::findOrFail($request->id);

        return view('admin.course.index', $this->html);
    }

    public function store(Request $request, Course $course)
    {
        if(!empty($request->id))
            $course = Course::findOrFail($request->id);

        $course->title = $request->title;
        $course->price = $request->price;
        $course->status = $request->boolean('status');
        
        if($course->save()) return back()->with("success", "Thành công");
        
        return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');
    }

    public function sort(Request $request)
    {
        foreach ($request->orders as $item) {
            Course::where('id', $item['id'])->update(['sort' => $item['sort']]);
        }

        return sendResponse($request->orders, 'Cập nhật thứ tự thành công');
    }
}
