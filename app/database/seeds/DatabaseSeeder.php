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

		$this->call('CategoriesTableSeeder');
		$this->call('QuestionsTableSeeder');
		$this->call('CategoryquestionTableSeeder');
		$this->call('AnswersTableSeeder');
	}

}