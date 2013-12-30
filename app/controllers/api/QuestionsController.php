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
		
		return Response::json(array(
			'message' => 'It is not possible to create new questions yet. This is a future feature.'
		), 501);
	}

	public function byCategory($id)
	{
		try {
			return Category::findOrFail($id)->questions;
		} catch(ModelNotFoundException $e) {
			return Response::json(array(
				'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
			), 404);
		}
	}

	public function show($id) 
	{
		try {
			return Question::findOrFail($id);
		} catch(ModelNotFoundException $e) {
		    return Response::json(array(
		    	'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
	    	), 404);
		}
	}

	public function random()
	{
		return Question::orderBy(\DB::raw('RAND()'))->get()->first();
	}

	public function randomByCategory($categoryId)
	{
		return Category::find($categoryId)->questions()->orderBy(\DB::raw('RAND()'))->get()->first();
	}

}