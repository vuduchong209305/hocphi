<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;

class AdminController extends BaseController
{
	public function index(Request $request)
	{
		$this->html['roles'] = Role::get();
		$this->html['data'] = Admin::filter($request->q, $request->role_id)->paginate();
		return view('admin.admin.index', $this->html);
	}

	public function create(Request $request)
	{
		$this->html['role'] = Role::status()->get();

		if(!empty($request->id))
			$this->html['admin'] = Admin::findOrFail($request->id);

		return view('admin.admin.create', $this->html);
	}

	public function store(AdminRequest $request, Admin $admin)
	{
		if(!empty($request->id)) {
			$admin = Admin::findOrFail($request->id);

			if(!empty($request->password)) {
				$admin->password = bcrypt($request->password);
			}
		} else {
			$admin->password = bcrypt($request->password);
		}
		
		$admin->email    = $request->email;
		$admin->status   = $request->boolean('status');
		$admin->phone    = $request->phone;
		$admin->fullname = $request->fullname;
		$admin->address  = $request->address;
		$admin->role_id  = $request->role_id;
		$admin->birthday = $request->birthday;
		$admin->passport = $request->passport;
		$admin->avatar   = $request->avatar;

		if($admin->save()) {
			vdh_activity_log("Lưu quản trị viên {$admin->email}");
			return !empty($request->id) ? back()->with('success', 'Lưu thành công') : redirect()->route('admin.index')->with("success", "Lưu thành công");
		}
		
		return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');
	}

	public function delete(Request $request)
	{
		$listID = $request->get('id');

		if(strlen($listID) > 0) {

			$ids = explode(';', $listID);

			if(count($ids) > 0) {

				if(in_array(1, $ids) || in_array(\Auth::id(), $ids)) return back()->withErrors('Không thể xóa được quản trị viên Cấp Cao hoặc Bạn không được xóa chính mình');

				\DB::beginTransaction();
				try {

					if(Admin::destroy($ids)) {

						\DB::commit();

						return back()->with('success', 'Xóa thành công');

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

	public function profile(Request $request)
	{
		if(!$request->isMethod('post')) {
			$this->html['role'] = Role::get();
			return view('admin.admin.profile', $this->html);
		}
		
		$admin           = Admin::findOrFail(\Auth::id());
		$admin->email    = $request->email;
		$admin->phone    = $request->phone;
		$admin->fullname = $request->fullname;
		$admin->address  = $request->address;
		$admin->birthday = date('Y-m-d', strtotime($request->birthday));
		$admin->passport = $request->passport;
		$admin->avatar   = $request->avatar;

		if($request->password != $request->password_confirmation) return back()->withErrors('Nhập lại mật khẩu không đúng');

		if($request->password != '') {
			$admin->password = bcrypt($request->password);
		}

		if($admin->save()) return back()->with('success', 'Cập nhật thành công');
		
		return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');

	}
}
