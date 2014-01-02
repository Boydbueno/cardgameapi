<?php

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('questions')->delete();

		$questions = array(
			array(
				'question' => 'This will be a math question',
				'correct_answer_id' => 1337
			),			
			array(
				'question' => 'This will be another math question',
				'correct_answer_id' => 1337
			),
			array(
				'question' => 'This will be a science question',
				'correct_answer_id' => 1337
			),
			array(
				'question' => 'This will be another science question',
				'correct_answer_id' => 1337
			),
			array(
				'question' => 'This will be a food question',
				'correct_answer_id' => 1337
			),
			array(
				'question' => 'This will be another food question',
				'correct_answer_id' => 1337
			),
			array(
				'question' => 'This will be a history question',
				'correct_answer_id' => 1337
			),
			array(
				'question' => 'This will be another history question',
				'correct_answer_id' => 1337
			)
		);

		// Uncomment the below to run the seeder
		DB::table('questions')->insert($questions);
	}

}
