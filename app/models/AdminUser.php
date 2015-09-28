<?php

class AdminUser extends \Eloquent {
	protected $fillable = ['username', 'email', 'password','permissions'];
	protected $table = 'admin_info';
	public function hasAccess($requestPermission)
	{
		$permissions = $this->permissions;
		if(!$this->isJson($permissions)) return false;
		$json = json_decode($permissions, true);
		if(isset($json[$requestPermission]))
		{
			return true;
		}
		return false;
	}
	protected function isJson($string)
	{
		@json_decode($string);
		return (json_last_error() == JSON_ERROR_NONE);
	}
}