<?php 

namespace DTT\Sentry;
use Config;
Config::set('cartalyst/sentry::config.users.model', 'DTT\Sentry\NTDUser');
Config::set('cartalyst/sentry::config.user_groups_pivot_table', 'admin_users_groups');
Config::set('cartalyst/sentry::config.groups.model', 'DTT\Sentry\NTDGroup');
class AdminSentry extends \Sentry {
	

}