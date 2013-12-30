<?php

class CategoryquestionTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('category_question')->delete();

		$category_question = array(
			array(
				'category_id' => Category::whereLabel('Math')->first()->id,
				'question_id' => Question::whereQuestion('This will be a math question')->first()->id
			),
			array(
				'category_id' => Category::whereLabel('Math')->first()->id,
				'question_id' => Question::whereQuestion('This will be another math question')->first()->id
			),
			array(
				'label' => Category::whereLabel('Science')->first()->id,
				'question_id' => Question::whereQuestion('This will be a science question')->first()->id
			),
			array(
				'label' => Category::whereLabel('Science')->first()->id,
				'question_id' => Question::whereQuestion('This will be another science question')->first()->id
			),
			array(
				'label' => Category::whereLabel('Food')->first()->id,
				'question_id' => Question::whereQuestion('This will be a food question')->first()->id
			),
			array(
				'label' => Category::whereLabel('Food')->first()->id,
				'question_id' => Question::whereQuestion('This will be another food question')->first()->id
			),
			array(
				'label' => Category::whereLabel('History')->first()->id,
				'question_id' => Question::whereQuestion('This will be a history question')->first()->id
			),
			array(
				'label' => Category::whereLabel('History')->first()->id,
				'question_id' => Question::whereQuestion('This will be another history question')->first()->id
			)
		);

		// Uncomment the below to run the seeder
		DB::table('category_question')->insert($category_question);
	}

}
