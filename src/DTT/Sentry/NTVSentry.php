<?php 

namespace DTT\Sentry;
use Config;
Config::set('cartalyst/sentry::config.users.model', 'DTT\Sentry\NTV\NTVUser');
Config::set('cartalyst/sentry::config.user_groups_pivot_table', 'ntv_users_groups');
Config::set('cartalyst/sentry::config.groups.model', 'DTT\Sentry\NTV\NTVGroup');
class NTVSentry extends \Sentry {
	
}