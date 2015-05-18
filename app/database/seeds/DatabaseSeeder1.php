<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AdminUserTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('CountryTableSeeder');
		$this->call('EducationTableSeeder');
		$this->call('LanguageTableSeeder');
		$this->call('LevelTableSeeder');
		$this->call('ProvinceTableSeeder');
		$this->call('WorkTypeTableSeeder');
		$this->call('JobseekerTableSeeder');
	}

}
