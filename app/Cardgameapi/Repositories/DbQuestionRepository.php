<?php namespace Cardgameapi\Repositories;

use Question;
use Answer;

class DbQuestionRepository implements QuestionRepositoryInterface {

	protected $category;
	protected $user;

	public function __construct(CategoryRepositoryInterface $category, UserRepositoryInterface $user)
	{
		$this->category = $category;
		$this->user = $user;
	}

	public function getAll($limit = 20, $offset = 0)
	{
		$questions = Question::with('answers');

		if($limit) $questions->take($limit);
		if($offset) $questions->skip($offset);

		return $questions->get();
	}

	public function find($id)
	{
		return Question::with('answers')->findOrFail($id);
	}

	public function random()
	{
		return Question::orderBy(\DB::raw('RAND()'))->with('answers')->get()->first();
	}

	public function search($query, $limit = 20, $offset = 0)
	{
		$questions = Question::with('answers')->where('question', 'LIKE', '%'.$query.'%');

		if($limit) $questions->take($limit);
		if($offset) $questions->skip($offset);

		return $questions->get();
	}

	public function findByCategory($id, $limit = 20, $offset = 0)
	{
		$questions = $this->category->find($id)->questions()->with('answers');

		if($limit) $questions->take($limit);
		if($offset) $questions->skip($offset);

		return $questions->get();
	}

	public function randomByCategory($id)
	{
		return $this->category->find($id)->questions()->orderBy(\DB::raw('RAND()'))->get()->first();
	}

	public function findByUser($id, $limit = 20, $offset = 0)
	{
		$questions = $this->user->find($id)->questions()->with('answers');

		if($limit) $questions->take($limit);
		if($offset) $questions->skip($offset);

		return $questions->get();
	}

	public function create($question, $userid, Array $answers, Array $categories)
	{
		$newQuestion = new Question;
		$newQuestion->question = $question;
		$newQuestion->user_id = $userid;
		$newQuestion->save();

		$answerModels = array_map(function($answer) {
			return new Answer(array('answer' => $answer));
		}, $answers);

		$newQuestion->answers()->saveMany($answerModels);

		$newQuestion->categories()->sync($categories);

		return $newQuestion;
	}

	public function delete($id) 
	{
		return Question::findOrFail($id)->delete();
	}

}