<?php namespace Cardgameapi\Repositories;

use Question;

class DbQuestionRepository implements QuestionRepositoryInterface {

	public function getAll()
	{
		return Question::all();
	}

	public function find($id)
	{
		return Question::findOrFail($id);
	}

	public function random()
	{
		return Question::orderBy(\DB::raw('RAND()'))->get()->first();
	}

	public function findByCategory($id)
	{
		return \Category::findOrFail($id)->questions;
	}

	public function randomByCategory($id)
	{
		return \Category::find($id)->questions()->orderBy(\DB::raw('RAND()'))->get()->first();
	}

}