<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GroupTableSeeder extends Seeder {

	public function run()
	{
		$group = Sentry::createGroup(array(
	        'name'        => 'Administrator',
	        'permissions' => array(
	            'admin' => 1,
	            'ntd' => 1,
	            'ntv' => 1,
	        ),
	    ));
	    $group = Sentry::createGroup(array(
	        'name'        => 'Employer',
	        'permissions' => array(
	            'ntv' => 1,
	        ),
	    ));
	    $group = Sentry::createGroup(array(
	        'name'        => 'Jobseeker',
	        'permissions' => array(
	        ),
	    ));
	}

}