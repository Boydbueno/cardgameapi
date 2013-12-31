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

		$response = Response::json($questions);
		// return Response::jsonOrJsonp($questions);
		
		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

	public function create()
	{
		// TODO: Implement creating new Question
		
		$response = Response::json(array(
			'message' => 'It is not possible to create new questions yet. This is a future feature.'
		), 501);

		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

	public function byCategory($id)
	{
		try {

			$questions = $this->question->findByCategory($id);
			$response = Response::json($questions);

			return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
		} catch(ModelNotFoundException $e) {
			$response = Response::json(array(
				'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
			), 404);

			return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
		}
	}

	public function show($id) 
	{
		try {

			$question = $this->question->find($id);
			$response = Response::json($question);

			return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;

		} catch(ModelNotFoundException $e) {

		    $response = Response::json(array(
		    	'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
	    	), 404);

			return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;

		}
	}

	public function random()
	{

		$randomQuestion = $this->question->random();

		$response = Response::json($randomQuestion);

		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

	public function randomByCategory($id)
	{
		$randomQuestion = $this->question->randomByCategory($id);
		$response = Response::json($randomQuestion);
		
		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

}