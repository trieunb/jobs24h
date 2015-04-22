<?php 

namespace DTT\Sentry;
use Config;
Config::set('cartalyst/sentry::config.users.model', 'DTT\Sentry\NTD\NTDUser');
Config::set('cartalyst/sentry::config.user_groups_pivot_table', 'ntd_users_groups');
Config::set('cartalyst/sentry::config.groups.model', 'DTT\Sentry\NTD\NTDGroup');
class NTDSentry extends \Sentry {
	
}