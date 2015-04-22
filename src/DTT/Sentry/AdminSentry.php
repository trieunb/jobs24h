<?php 

namespace DTT\Sentry;
use Config;
Config::set('cartalyst/sentry::config.users.model', 'DTT\Sentry\Admin\AdminUser');
Config::set('cartalyst/sentry::config.user_groups_pivot_table', 'admin_users_groups');
Config::set('cartalyst/sentry::config.groups.model', 'DTT\Sentry\Admin\AdminGroup');
class AdminSentry extends \Sentry {
	
}