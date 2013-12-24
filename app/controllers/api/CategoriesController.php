<?php namespace controllers\api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Category;

use Response;


class CategoriesController extends \BaseController {

	/*
	|---------------------------------------------------------------------------
	| Collection actions
	|---------------------------------------------------------------------------
	*/

	public function getIndex()
	{
		return Category::all();
	}

	public function postIndex()
	{
		// TODO: Implement creating new category
		// This route will need authorization
		
		// If this request is send by a user, it'll be added to the user categories
		
		return Response::json(array(
			'message' => 'It is not possible to create new categories yet. This is a future feature.'
		), 501);
	}

	public function deleteIndex()
	{
		return Response::json(array(
			'message' => 'You are not allowed to send a DELETE request to the categories collection. Did you forget to add an id?'
		), 405);
	}

	public function putIndex()
	{
		return Response::json(array(
			'message' => 'You are not allowed to send a PUT request to the categories collection. Did you forget to add an id?'
		), 405);
	}

	/*
	|---------------------------------------------------------------------------
	| Single actions
	|---------------------------------------------------------------------------
	*/

	public function getShow($id)
	{

		try {
			return Category::findOrFail($id);
		} catch(ModelNotFoundException $e) {
		    return Response::json(array(
		    	'message' => 'This resource does not exist. Possibly the resource has been deleted, please check double check the id'
	    	), 404);
		}
	}

}