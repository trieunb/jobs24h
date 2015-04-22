<?php 

namespace DTT\Sentry\Admin;
class AdminUser extends \Cartalyst\Sentry\Users\Eloquent\User {
	protected $table = 'admin_info';
}