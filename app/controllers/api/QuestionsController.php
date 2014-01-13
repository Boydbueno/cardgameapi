<?php namespace controllers\api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Cardgameapi\Repositories\QuestionRepositoryInterface;
use Question;
use Category;
use Response;
use Request;
use Input;

class QuestionsController extends \BaseController {

	protected $question;

	public function __construct(QuestionRepositoryInterface $question)
	{
		$this->question = $question;
	}

	public function index() 
	{
		$questions = $this->question;

		if (Input::get('q'))
		{
			$questions = $questions->search(Input::get('q'));
		}
		else
		{
			$questions = $questions->getAll();
		}

		if(Request::wantsXML()) {
			return Response::view('xml.questions', compact('questions'), 200, [
				'Content-Type' => 'application/xml; charset=UTF-8'
			]);
		}

		return Response::jsonOrJsonp($questions);
	}

	public function create()
	{

		if ( ! Input::get('user_id'))
		{
			return Response::jsonOrJsonp(array(
				'message' => 'You need to supply a user_id if you wish to add a question'
			), 400);
		}

		// TODO: Check if user id is correct
		
		$question = Input::get('question');
		$user_id = Input::get('user_id');
		$answers = json_decode(Input::get('answers'));
		$categories = json_decode(Input::get('categories'));

		$newQuestion = $this->question->create($question, $user_id, $answers, $categories);

		return Response::jsonOrJsonp($newQuestion, 201, [
			'location' => route('question.show', ['id' => $newQuestion->id])
		]);
		
	}

	public function delete($id)
	{

		if ( ! Input::get('user_id'))
		{
			return Response::jsonOrJsonp(array(
				'message' => 'You need to supply a user_id if you wish to delete a question'
			), 400);
		}

		// Check if the user_id is valid
		// Check if the question matches with the user

		try {
			
			$this->question->delete($id);
			return Response::make(null, 204);

		} catch(ModelNotFoundException $e) {

			return Response::jsonOrJsonp(array(
				'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
			), 404);

		}

	}

	public function byCategory($id)
	{
		try {

			$questions = $this->question->findByCategory($id);

			if(Request::wantsXML()) {
				return Response::view('xml.questions', compact('questions'), 200, [
					'Content-Type' => 'application/xml; charset=UTF-8'
				]);
			}

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

			if(Request::wantsXML()) {
				return Response::view('xml.question', compact('question'), 200, [
					'Content-Type' => 'application/xml; charset=UTF-8'
				]);
			}

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

		if(Request::wantsXML()) {
			return Response::view('xml.question', compact('question'), 200, [
				'Content-Type' => 'application/xml; charset=UTF-8'
			]);
		}

		return Response::jsonOrJsonp($randomQuestion);
	}

	public function randomByCategory($id)
	{
		$randomQuestion = $this->question->randomByCategory($id);

		if(Request::wantsXML()) {
			return Response::view('xml.question', compact('question'), 200, [
				'Content-Type' => 'application/xml; charset=UTF-8'
			]);
		}
		
		return Response::jsonOrJsonp($randomQuestion);
	}

	public function byUser($id)
	{
		try {

			$questions = $this->question->findByUser($id);

			if(Request::wantsXML()) {
				return Response::view('xml.questions', compact('questions'), 200, [
					'Content-Type' => 'application/xml; charset=UTF-8'
				]);
			}

			return Response::jsonOrJsonp($questions);
		
		} catch(ModelNotFoundException $e) {
		
			return Response::jsonOrJsonp(array(
				'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
			), 404);

		}
	}

}