<?php 

namespace DTT\Sentry;
class NTDUser extends \Cartalyst\Sentry\Users\Eloquent\User {
	protected $table = 'admin_info';
}