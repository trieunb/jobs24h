<?php 
namespace DTT\Sentry;
use AdminUser, Session, Cookies;
use DTT\Sentry\Hashing\Sha256Hasher as Hasher;
class AdminAuth {
	protected static $hasher = 'sha256';
	protected static $cookie_name = 'vnjobs_admin';

	public static function authenticate($credentials = array(), $remember = false)
	{
		$user = AdminUser::where('username', '=', $credentials['username'])
		->first();
		if(count($user) == 1)
		{
			if(Hasher::checkHash($credentials['password'], $user->password)) {
				$session_value = array($user->id, $user->persist_code);
				if($remember) 
				{
					$cookie = new Cookies();
					$cookie->forever($session_value);
				}
				Session::put(self::$cookie_name, $session_value);
				$user->persist_code = md5(time());
				$user->save();
				return true;
			}
			return false;
		}
		
		return false;
	}

	public static function logout()
	{
		$cookie = new Cookies();
		$cookie->forget(self::$cookie_name);
		Session::forget(self::$cookie_name);
	}
	public static function check()
	{

		$cookie = new Cookies;
		if( ! $cookie->get(self::$cookie_name) && ! Session::get(self::$cookie_name))
		{
			return false;
		}
		if( ! Session::get(self::$cookie_name))
		{
			Session::put(self::$cookie_name, $cookie->get(self::$cookie_name));
		}
		$userArray = Session::get(self::$cookie_name);
		if( ! is_array($userArray))
		{
			return false;
		}
		list($userId, $userPersistCode) = $userArray;
		if( ! $user = AdminUser::find($userId))
		{
			return false;
		}
		return true;
	}
	public static function getUser()
	{
		if( ! self::check())
		{
			return false;
		}
		$userArray = Session::get(self::$cookie_name);
		if( ! is_array($userArray))
		{
			return false;
		}
		list($userId, $userPersistCode) = $userArray;
		if( ! $user = AdminUser::find($userId))
		{
			return false;
		}
		return $user;
	}
	public static function findUserById($id = false)
	{
		if($id)
		{
			$user = AdminUser::find($id);
			if(count($user))
			{
				return $user;
			} 
			return false;
		}
		return false;
	}
	

}