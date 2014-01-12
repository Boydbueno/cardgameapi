<?php

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('questions')->delete();

		$questions = array(
			array(
				'question' => 'This will be a math question',
				'user_id' => User::whereUsername('Admin')->first()->id
			),			
			array(
				'question' => 'This will be another math question',
				'user_id' => User::whereUsername('Admin')->first()->id
			),
			array(
				'question' => 'This will be a science question',
				'user_id' => User::whereUsername('Admin')->first()->id
			),
			array(
				'question' => 'This will be another science question',
				'user_id' => User::whereUsername('Admin')->first()->id
			),
			array(
				'question' => 'This will be a food question',
				'user_id' => User::whereUsername('Admin')->first()->id
			),
			array(
				'question' => 'This will be another food question',
				'user_id' => User::whereUsername('Admin')->first()->id
			),
			array(
				'question' => 'This will be a history question',
				'user_id' => User::whereUsername('Admin')->first()->id
			),
			array(
				'question' => 'This will be another history question',
				'user_id' => User::whereUsername('Admin')->first()->id
			)
		);

		// Uncomment the below to run the seeder
		DB::table('questions')->insert($questions);
	}

}
