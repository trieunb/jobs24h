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

		// $this->call('AdminUserTableSeeder');
		// $this->call('CategoryTableSeeder');
		// $this->call('CountryTableSeeder');
		// $this->call('EducationTableSeeder');
		// $this->call('LanguageTableSeeder');
		// $this->call('LevelTableSeeder');
		// $this->call('ProvinceTableSeeder');
		// $this->call('WorkTypeTableSeeder');
		// $this->call('JobseekerTableSeeder');
		// $this->call('LevelLangTableSeeder');
		// $this->call('FieldsInWorkExpTableSeeder');
		// $this->call('SpecializedTableSeeder');
		// $this->call('AverageGradeTableSeeder');
		// $this->call('PackageTableSeeder');
		// $this->call('OrderTableSeeder');
		// $this->call('OrderDetailTableSeeder');
		$this->call('TrainingCatTableSeeder');

		$this->call('TrainingRollTableSeeder');

		//$this->call('OrderDetailTableSeeder');
		 //$this->call('RespondTableSeeder');

	}

}
