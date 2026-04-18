<?php 
namespace App\Helpers;

class MenuHelper {

	private static function dashboard_menu($menu = [])
	{
		if (RoleHelper::checkRole('dashboard')) {
			
			$menu[] = array(
				'title'   => __('menu_admin.home'),
				'url'     => route('dashboard'),
				'icon'    => 'ti-home',
				'active'  => 'hadmin/dashboard',
				'submenu' => []
			);
		}

		return $menu;
	}

	private static function admin_menu($menu = []) {

		$msub = array();

		if (RoleHelper::checkRole('admin.index')) {

			$msub[] = array(
				'url'    => route('admin.index'),
				'title'  => 'Tài khoản',
				'active' => 'hadmin/admin',
			);
		}

		if (RoleHelper::checkRole('admin.role.index')) {

			$msub[] = array(
				'url'    => route('admin.role.index'),
				'title'  => 'Nhóm quyền',
				'active' => 'hadmin/admin/role/*',
			);
		}

		if (count($msub) > 0) {

			$menu[] = array(
				'title'   => 'Quản trị viên',
				'icon'    => 'ti-user-star',
				'active'  => 'hadmin/admin/*',
				'submenu' => $msub
			);
		}

		return $menu;
	}

	private static function user_menu($menu = [])
	{
		$msub = array();

		if (RoleHelper::checkRole('user.index')) {

			$msub[] = array(
				'url'    => route('user.index'),
				'title'  => __('menu_admin.list'),
				'active' => 'hadmin/user/index',
			);
		}

		if (RoleHelper::checkRole('user.create')) {

			$msub[] = array(
				'url'    => route('user.create'),
				'title'  => __('menu_admin.add'),
				'active' => 'hadmin/user/create',
			);
		}

		if (count($msub) > 0) {

			$menu[] = array(
				'title'   => 'Tài khoản đăng ký',
				'url'     => route('user.index'),
				'icon'    => 'ti-users-group',
				'active'  => 'hadmin/user/*',
				'submenu' => $msub
			);
		}

		return $menu;
	}

	private static function course_menu($menu = [])
	{
		if (RoleHelper::checkRole('course.index')) {
			
			$menu[] = array(
				'title'   => 'Khóa học',
				'url'     => route('course.index'),
				'icon'    => 'ti-books',
				'active'  => 'hadmin/course/*',
				'submenu' => []
			);
		}

		return $menu;
	}

	private static function order_menu($menu = [])
	{
		if (RoleHelper::checkRole('order.index')) {
			
			$menu[] = array(
				'title'   => 'Hồ sơ đăng ký',
				'url'     => route('order.index'),
				'icon'    => 'ti-box',
				'active'  => 'hadmin/order/*',
				'submenu' => []
			);
		}

		return $menu;
	}

	private static function mail_menu($menu = []) {

		$msub = array();

		if (RoleHelper::checkRole('mail.index')) {

			$msub[] = array(
				'url'    => route('mail.index'),
				'title'  => 'Danh sách',
				'active' => 'hadmin/mail/index',
			);
		}
		
		if (count($msub) > 0) {

			$menu[] = array(
				'title'   => 'Mail',
				'url'     => route('mail.index'),
				'icon'    => 'ti-mail',
				'active'  => 'hadmin/mail/*',
				'submenu' => $msub
			);
		}

		return $menu;
	}

	private static function setting_menu($menu = [])
	{
		$msub = array();

		if (RoleHelper::checkRole('setting.index')) {

			$msub[] = array(
				'url'    => route('setting.index'),
				'title'  => 'Cấu hình',
				'active' => 'hadmin/setting',
			);
		}

		if (count($msub) > 0) {

			$menu[] = array(
				'title'   => 'Cài đặt',
				'url'     => route('setting.index'),
				'icon'    => 'ti-settings',
				'active'  => 'hadmin/setting/*',
				'submenu' => $msub
			);
		}

		return $menu;
	}

	public static function getAllMenu() {

		$menu = [];
		$menu = self::dashboard_menu($menu);
		$menu = self::admin_menu($menu);
		$menu = self::course_menu($menu);
		$menu = self::order_menu($menu);
		$menu = self::mail_menu($menu);
		$menu = self::setting_menu($menu);
		
		return $menu;
	}
}


?>