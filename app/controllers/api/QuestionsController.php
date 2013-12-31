<?php namespace controllers\api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Question;
use Category;
use Response;
use Input;

class QuestionsController extends \BaseController {

	public function index() {
		$response = Response::json(Question::all());
		
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
			$response = Response::json(Category::findOrFail($id)->questions);

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
			$response = Response::json(Question::findOrFail($id));

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
		$response = Response::json(Question::orderBy(\DB::raw('RAND()'))->get()->first());

		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

	public function randomByCategory($categoryId)
	{
		$response = Response::json(Category::find($categoryId)->questions()->orderBy(\DB::raw('RAND()'))->get()->first());
		
		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

}