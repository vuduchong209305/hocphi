<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RoleRequest;
use App\Helpers\RoleHelper;

class RoleController extends BaseController
{
	public function index(Request $request)
	{
		$this->html['data'] = Role::filter($request->q)->paginate();
		return view('admin.role.index', $this->html);
	}

	public function create(Request $request)
	{
		$this->html['permissions'] = RoleHelper::getRoutesName();

		if(!empty($request->id))
			$this->html['role'] = Role::findOrFail($request->id);

		return view('admin.role.create', $this->html);
	}

	public function store(RoleRequest $request, Role $role)
	{
		if(!empty($request->id)) {
			$role = Role::findOrFail($request->id);
		} 

		$role->name        = $request->name;
		$role->description = $request->description;
		$role->status      = $request->boolean('status');
		$role->permission  = !empty($request->permission) ? implode(';', $request->permission) : null;
		$role->avatar      = $request->avatar;
		
		if($role->save()) {
			return !empty($request->id) ? back()->with('success', 'Thành công') : redirect()->route('role.index')->with("success", "Thành công");
		}
		
		return back()->withErrors('Đã có lỗi xảy ra, vui lòng thử lại');
	}

	public function delete(Request $request)
	{
		$listID = $request->get('id');

		if(strlen($listID) > 0) {

			$ids = explode(';', $listID);

			foreach($ids as $id) {

				$check_role = Role::findOrFail($id)->user;

				if(count($check_role) > 0) return back()->with('error', 'Không được xoá vì còn tài khoản trong nhóm này');

				\DB::beginTransaction();
				try {

					if(Role::destroy($ids)) {

						\DB::commit();

						return back()->with('success', 'Xóa thành công');

					}

				} catch (Exception $e) {

					\DB::rollBack();
					throw new Exception($e->getMessage());

				}

			}

			return back()->with('success', 'Xóa thành công');

		}
		
		return back()->withErrors('Xóa thất bại');
	}
}
