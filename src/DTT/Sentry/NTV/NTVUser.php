<?php 

namespace DTT\Sentry\NTV;
class NTVUser extends \Cartalyst\Sentry\Users\Eloquent\User {
	protected $table = 'ntv_info';
}