<?php
namespace App\Helpers;

use App\Models\Lang;

class LangHelper {

	protected static $_select = ['id', 'name', 'image', 'title'];

	public static function getLang()
	{
		$langs = Lang::select(self::$_select)->where('status', 1)->get();
		return $langs;
	}

	public static function getLangDefault()
	{
		$query = Lang::select(self::$_select)->where('status', 1);

		if(isset($_COOKIE['lang_id']) && !is_null($_COOKIE['lang_id'])) {
			$lang = $query->where('id', $_COOKIE['lang_id'])->first();
		} else {
			$lang = $query->first();
		}
		
		return $lang;
	}

}