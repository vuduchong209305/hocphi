<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Opening;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $this->html['data'] = Course::orderBy('title')->get();

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
        
        if($course->save()) {
            // xoá cũ
            Opening::where('course_id', $course->id)->delete();

            if (!empty($request->openings)) {

                $codes = $request->openings['code'] ?? [];
                $dates = $request->openings['start_date'] ?? [];

                $data = [];

                foreach ($codes as $index => $code) {

                    if (!empty($code) && !empty($dates[$index])) {
                        $data[] = [
                            'course_id' => $course->id,
                            'code' => $code,
                            'start_date' => $dates[$index]
                        ];
                    }
                }

                Opening::insert($data);
            }

            return back()->with("success", "Thành công");
        }
        
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
