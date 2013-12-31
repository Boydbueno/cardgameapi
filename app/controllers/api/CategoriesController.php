<?php namespace controllers\api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Category;

use Input;
use Response;


class CategoriesController extends \BaseController {

	/*
	|---------------------------------------------------------------------------
	| Collection actions
	|---------------------------------------------------------------------------
	*/

	public function index()
	{
		$response = Response::json(Category::all());

		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

	public function create()
	{
		// TODO: Implement creating new category
		// This route will need authorization
		
		// If this request is send by a user, it'll be added to the user categories
		
		$response = Response::json(array(
			'message' => 'It is not possible to create new categories yet. This is a future feature.'
		), 501);

		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

	/*
	|---------------------------------------------------------------------------
	| Single actions
	|---------------------------------------------------------------------------
	*/

	public function show($id)
	{
		try {
			$response = Response::json(Category::findOrFail($id));

			return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
		} catch(ModelNotFoundException $e) {
		    $response = Response::json(array(
		    	'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
	    	), 404);

			return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
		}
	}

	public function update($id)
	{
		$response = Response::json(array(
			'message' => 'It is not possible to update a category yet. This is a future feature.'
		), 501);

		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

	public function delete($id)
	{
		$response = Response::json(array(
			'message' => 'It is not possible to delete a category yet. This is a future feature.'
		), 501);

		return (Input::get('callback')) ? $response->setCallback(Input::get('callback')) : $response;
	}

}