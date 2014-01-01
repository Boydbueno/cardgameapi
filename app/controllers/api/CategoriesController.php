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

		return Response::jsonOrJsonp(Category::all());

	}

	public function create()
	{
		// TODO: Implement creating new category
		// This route will need authorization
		
		// If this request is send by a user, it'll be added to the user categories
		
		return Response::jsonOrJsonp(array(
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

			return Response::jsonOrJsonp(Category::findOrFail($id));

		} catch(ModelNotFoundException $e) {

		    return Response::jsonOrJsonp(array(
		    	'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
	    	), 404);

		}
	}

	public function update($id)
	{
		return Response::jsonOrJsonp(array(
			'message' => 'It is not possible to update a category yet. This is a future feature.'
		), 501);
	}

	public function delete($id)
	{
		return Response::jsonOrJsonp(array(
			'message' => 'It is not possible to delete a category yet. This is a future feature.'
		), 501);
	}

}