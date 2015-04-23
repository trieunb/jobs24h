<?php

class AdminUser extends \Eloquent {
	protected $fillable = ['username', 'email', 'password'];
	protected $table = 'admin_info';
}