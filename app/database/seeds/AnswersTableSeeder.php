<?php

class AnswersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('answers')->delete();

		$answers = array(
			[
				'answer' => 'This is answer number 1 for a math question',
				'question_id' => Question::whereQuestion('This will be a math question')->first()->id
			],
			[
				'answer' => 'This is answer number 2 for a math question',
				'question_id' => Question::whereQuestion('This will be a math question')->first()->id
			],
			[
				'answer' => 'This is answer number 1 for another math question',
				'question_id' => Question::whereQuestion('This will be another math question')->first()->id
			],
			[
				'answer' => 'This is answer number 2 for another math question',
				'question_id' => Question::whereQuestion('This will be another math question')->first()->id
			],

			[
				'answer' => 'This is answer number 1 for a science question',
				'question_id' => Question::whereQuestion('This will be a science question')->first()->id
			],
			[
				'answer' => 'This is answer number 2 for a science question',
				'question_id' => Question::whereQuestion('This will be a science question')->first()->id
			],
			[
				'answer' => 'This is answer number 1 for another science question',
				'question_id' => Question::whereQuestion('This will be another science question')->first()->id
			],
			[
				'answer' => 'This is answer number 2 for another science question',
				'question_id' => Question::whereQuestion('This will be another science question')->first()->id
			],
			[
				'answer' => 'This is answer number 1 for a food question',
				'question_id' => Question::whereQuestion('This will be a food question')->first()->id
			],
			[
				'answer' => 'This is answer number 2 for a food question',
				'question_id' => Question::whereQuestion('This will be a food question')->first()->id
			],
			[
				'answer' => 'This is answer number 1 for another food question',
				'question_id' => Question::whereQuestion('This will be another food question')->first()->id
			],
			[
				'answer' => 'This is answer number 2 for another food question',
				'question_id' => Question::whereQuestion('This will be another food question')->first()->id
			],
			[
				'answer' => 'This is answer number 1 for a history question',
				'question_id' => Question::whereQuestion('This will be a history question')->first()->id
			],
			[
				'answer' => 'This is answer number 2 for a history question',
				'question_id' => Question::whereQuestion('This will be a history question')->first()->id
			],
			[
				'answer' => 'This is answer number 1 for another history question',
				'question_id' => Question::whereQuestion('This will be another history question')->first()->id
			],
			[
				'answer' => 'This is answer number 2 for another history question',
				'question_id' => Question::whereQuestion('This will be another history question')->first()->id
			]

		);

		// Uncomment the below to run the seeder
		DB::table('answers')->insert($answers);
	}

}
