<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting');
    }

    public function store(Request $request)
    {
        $options = $request->option;
        foreach($options as $key => $item) {
            Setting::updateOrCreate(['option_key' => $key], [
                'option_key'   => $key,
                'option_value' => is_array($item) ? json_encode($item) : $item
            ]);
        }

        return back()->with('success', 'Lưu thành công');
    }
}
