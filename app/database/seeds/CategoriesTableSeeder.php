<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('categories')->delete();

		$categories = array(
			array(
				'label' => 'Math',
				'description' => 'Math related questions'
			),
			array(
				'label' => 'Science',
				'description' => 'Science related questions'
			),
			array(
				'label' => 'Food',
				'description' => 'Food related questions'
			),
			array(
				'label' => 'History',
				'description' => 'History related questions'
			)
		);

		// Uncomment the below to run the seeder
		DB::table('categories')->insert($categories);
	}

}
