<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lang;

class LangController extends Controller
{
    public function index(Request $request)
    {
        $this->html['data'] = Lang::paginate();

        if(!empty($request->id))
            $this->html['lang'] = Lang::findOrFail($request->id);

        return view('admin.lang.index', $this->html);
    }

    public function store(Request $request, Lang $lang)
    {
        if(!empty($request->id))
            $lang = Lang::findOrFail($request->id);

        $lang->title = $request->title;
        $lang->name = $request->name;
        $lang->lang_class = $request->lang_class;
        $lang->description = $request->description;
        $lang->image = $request->image;
        $lang->status = $request->boolean('status');
        
        if($lang->save()) {
            vdh_activity_log("Lưu ngôn ngữ {$lang->title}");
            return back()->with("success", "Lưu thành công {$lang->title}");
        }

        return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');
    }

    public function delete(Request $request)
    {
        $listID = $request->get('id');

        if(strlen($listID) > 0) {

            $ids = explode(';', $listID);

            if(count($ids) > 0) {

                \DB::beginTransaction();
                try {

                    if(Lang::destroy($ids)) {
                        
                        \DB::commit();

                        return redirect()->route('lang.index')->with('success', 'Xóa thành công');

                    }
                    
                } catch (Exception $e) {

                    \DB::rollBack();
                    throw new Exception($e->getMessage());

                }
         
            }

            return back()->withErrors('Không có ID');
            
        }
        
        return back()->withErrors('Không có ID');
    }
}
