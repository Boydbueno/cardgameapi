<?php

class QuestionsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('questions')->delete();

		$questions = array(
			array(
				'question' => 'This will be a math question'
			),			
			array(
				'question' => 'This will be another math question'
			),
			array(
				'question' => 'This will be a science question'
			),
			array(
				'question' => 'This will be another science question'
			),
			array(
				'question' => 'This will be a food question'
			),
			array(
				'question' => 'This will be another food question'
			),
			array(
				'question' => 'This will be a history question'
			),
			array(
				'question' => 'This will be another history question'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('questions')->insert($questions);
	}

}
