<?php namespace controllers\api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Cardgameapi\Repositories\QuestionRepositoryInterface;
use Question;
use Category;
use Response;
use Request;
use Input;
use User;

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
			$questions = $questions->search(Input::get('q'), Input::get('limit'), Input::get('offset'));
		}
		else
		{
			$questions = $questions->getAll(Input::get('limit'), Input::get('offset'));
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
		// TODO: Way too much going on here. Extract into a service

		$user_id = Input::get('user_id');

		if ( ! $user_id )
		{
			return Response::error('You need to supply a user_id if you wish to add a question');
		}

		try{

			User::findOrFail($user_id);

		} catch(ModelNotFoundException $e) {

			return Response::error('The supplied user_id doesn\'t match any user');

		}
		
		$question = Input::get('question');
		$user_id = Input::get('user_id');
		$answers = json_decode(Input::get('answers'));
		$categories = json_decode(Input::get('categories'));

		// TODO: Pass answer models instead of an array
		// TODO: Pass category models instead of an array

		$newQuestion = $this->question->create($question, $user_id, $answers, $categories);

		if(Request::wantsXML()) {
			return Response::view('xml.question', ['question' => $newQuestion], 201, [
				'Content-Type' => 'application/xml; charset=UTF-8',
				'location' => route('question.show', ['id' => $newQuestion->id])
			]);
		}

		return Response::jsonOrJsonp($newQuestion, 201, [
			'location' => route('question.show', ['id' => $newQuestion->id])
		]);
		
	}

	public function update($id) {
		$input = Input::all();
		$user_id = $input['user_id'];

		$question = $input['question'];
		$answers = json_decode($input['answers']);
		$categories = json_decode($input['categories']);

		if ( ! $user_id )
		{
			return Response::error('You need to supply a user_id if you wish to delete a question');
		}

		try{

			User::findOrFail($user_id);

		} catch(ModelNotFoundException $e) {

			return Response::error('The supplied user_id doesn\'t match any user');

		}
		$questionToUpdate = $this->question->update($id, $question, $answers, $categories);

		if(Request::wantsXML()) {
			return Response::view('xml.question', ['question' => $questionToUpdate], 200, [
				'Content-Type' => 'application/xml; charset=UTF-8',
				'location' => route('question.show', ['id' => $questionToUpdate->id])
			]);
		}

		return Response::jsonOrJsonp($questionToUpdate, 200, [
			'location' => route('question.show', ['id' => $questionToUpdate->id])
		]);

	}

	public function delete($id)
	{

		$user_id = Input::get('user_id');

		if ( ! $user_id )
		{
			return Response::error('You need to supply a user_id if you wish to delete a question');
		}

		try{

			User::findOrFail($user_id);

		} catch(ModelNotFoundException $e) {

			return Response::error('The supplied user_id doesn\'t match any user');

		}

		
		// Todo: Check if the question matches with the user

		try {
			
			$this->question->delete($id);
			return Response::make(null, 204);

		} catch(ModelNotFoundException $e) {

			return Response::error('This resource does not exist. Possibly the resource has been deleted, please double check the id', 404);

		}

	}

	public function byCategory($id)
	{
		try {

			$questions = $this->question->findByCategory($id, Input::get('limit'), Input::get('offset'));

			if(Request::wantsXML()) {
				return Response::view('xml.questions', compact('questions'), 200, [
					'Content-Type' => 'application/xml; charset=UTF-8'
				]);
			}

			return Response::jsonOrJsonp($questions);
		
		} catch(ModelNotFoundException $e) {
		
			return Response::error('This resource does not exist. Possibly the resource has been deleted, please double check the id', 404);

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

		    return Response::error('This resource does not exist. Possibly the resource has been deleted, please double check the id', 404);

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

			$questions = $this->question->findByUser($id, Input::get('limit'), Input::get('offset'));

			if(Request::wantsXML()) {
				return Response::view('xml.questions', compact('questions'), 200, [
					'Content-Type' => 'application/xml; charset=UTF-8'
				]);
			}

			return Response::jsonOrJsonp($questions);
		
		} catch(ModelNotFoundException $e) {
		
			return Response::error('This resource does not exist. Possibly the resource has been deleted, please double check the id', 404);

		}
	}

}