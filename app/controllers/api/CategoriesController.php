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

	public function index()
	{
		return Category::all();
	}

	public function create()
	{
		// TODO: Implement creating new category
		// This route will need authorization
		
		// If this request is send by a user, it'll be added to the user categories
		
		return Response::json(array(
			'message' => 'It is not possible to create new categories yet. This is a future feature.'
		), 501);
	}

	/*
	|---------------------------------------------------------------------------
	| Single actions
	|---------------------------------------------------------------------------
	*/

	public function show($id)
	{
		try {
			return Category::findOrFail($id);
		} catch(ModelNotFoundException $e) {
		    return Response::json(array(
		    	'message' => 'This resource does not exist. Possibly the resource has been deleted, please check double check the id'
	    	), 404);
		}
	}

	public function update($id)
	{
		return Response::json(array(
			'message' => 'It is not possible to update a category yet. This is a future feature.'
		), 501);
	}

}