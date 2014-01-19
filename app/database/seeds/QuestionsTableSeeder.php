<?php

use Carbon\Carbon;

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('questions')->delete();

		$now = date('Y-m-d H:i:s');

		$questions = array(
			array(
				'question' => 'This will be a math question',
				'user_id' => User::whereUsername('Admin')->first()->id,
				'created_at' => $now
			),			
			array(
				'question' => 'This will be another math question',
				'user_id' => User::whereUsername('Admin')->first()->id,
				'created_at' => $now
			),
			array(
				'question' => 'This will be a science question',
				'user_id' => User::whereUsername('Admin')->first()->id,
				'created_at' => $now
			),
			array(
				'question' => 'This will be another science question',
				'user_id' => User::whereUsername('Admin')->first()->id,
				'created_at' => $now
			),
			array(
				'question' => 'This will be a food question',
				'user_id' => User::whereUsername('Admin')->first()->id,
				'created_at' => $now
			),
			array(
				'question' => 'This will be another food question',
				'user_id' => User::whereUsername('Admin')->first()->id,
				'created_at' => $now
			),
			array(
				'question' => 'This will be a history question',
				'user_id' => User::whereUsername('Admin')->first()->id,
				'created_at' => $now
			),
			array(
				'question' => 'This will be another history question',
				'user_id' => User::whereUsername('Admin')->first()->id,
				'created_at' => $now
			)
		);

		// Uncomment the below to run the seeder
		DB::table('questions')->insert($questions);
	}

}
