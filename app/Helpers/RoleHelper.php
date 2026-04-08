<?php 
namespace App\Helpers;

use App\Models\User;
use Route;

class RoleHelper {
	
	public static function checkRole($route)
	{
		if(auth()->id() == 1) return true;
		
		$user = User::find(auth()->id())->role;

		if(!$user) return false;

		$permission = explode(';', $user->permission);

	    return is_array($permission) && in_array($route, $permission);

	}

	public static function getRoutesName()
	{
		$permissions = [];
		
		foreach (Route::getRoutes()->get() as $route) {
	        if(isset($route->action['middleware']) && in_array('CheckAdminLogin', $route->action['middleware'])) {
	            $permissions[] = $route->getName();
	        }
	    }

	    return $permissions;
	}
}


?>