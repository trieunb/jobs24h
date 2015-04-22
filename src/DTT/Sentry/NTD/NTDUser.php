<?php 

namespace DTT\Sentry\NTD;
class NTDUser extends \Cartalyst\Sentry\Users\Eloquent\User {
	protected $table = 'ntd_info';
}