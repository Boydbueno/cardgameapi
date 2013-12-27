<?php namespace controllers\api;

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

}