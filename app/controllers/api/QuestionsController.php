<?php namespace controllers\api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Cardgameapi\Repositories\QuestionRepositoryInterface;
use Question;
use Category;
use Response;
use Input;

class QuestionsController extends \BaseController {

	protected $question;

	public function __construct(QuestionRepositoryInterface $question)
	{
		$this->question = $question;
	}

	public function index() {

		$questions = $this->question->getAll();

		return Response::jsonOrJsonp($questions);
	}

	public function create()
	{
		// TODO: Implement creating new Question
		
		return Response::jsonOrJsonp(array(
			'message' => 'It is not possible to create new questions yet. This is a future feature.'
		), 501);
	}

	public function byCategory($id)
	{
		try {

			$questions = $this->question->findByCategory($id);

			return Response::jsonOrJsonp($questions);
		
		} catch(ModelNotFoundException $e) {
		
			return Response::jsonOrJsonp(array(
				'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
			), 404);

		}
	}

	public function show($id) 
	{
		try {

			$question = $this->question->find($id);

			return Response::jsonOrJsonp($question);

		} catch(ModelNotFoundException $e) {

		    return Response::jsonOrJsonp(array(
		    	'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
	    	), 404);

		}
	}

	public function random()
	{

		$randomQuestion = $this->question->random();

		return Response::jsonOrJsonp($randomQuestion);
	}

	public function randomByCategory($id)
	{
		$randomQuestion = $this->question->randomByCategory($id);
		
		return Response::jsonOrJsonp($randomQuestion);
	}

}