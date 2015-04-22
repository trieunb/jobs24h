<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdminUserTableSeeder extends Seeder {

	public function run()
	{
		AdminUser::create([
			'username'	=>	'admin',
			'email'		=>	'admin@localhost.com',
			'password'	=>	DTT\Sentry\Hashing\Sha256Hasher::hash('admin')
		]);
	}

}