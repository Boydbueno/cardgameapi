<?php namespace Cardgameapi\Repositories;

use Question;

class DbQuestionRepository implements QuestionRepositoryInterface {

	protected $category;

	public function __construct(CategoryRepositoryInterface $category)
	{
		$this->category = $category;
	}

	public function getAll()
	{
		return Question::with('answers')->get();
	}

	public function find($id)
	{
		return Question::with('answers')->findOrFail($id);
	}

	public function random()
	{
		return Question::orderBy(\DB::raw('RAND()'))->with('answers')->get()->first();
	}

	public function findByCategory($id)
	{
		return $this->category->find($id)->questions()->with('answers')->get();
	}

	public function randomByCategory($id)
	{
		return \Category::find($id)->questions()->orderBy(\DB::raw('RAND()'))->get()->first();
	}

}