<?php namespace controllers\api;

use Cardgameapi\Repositories\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Category;
use Response;
use Request;
use Input;


class CategoriesController extends \BaseController {

	protected $category;

	public function __construct(CategoryRepositoryInterface $category)
	{
		$this->category = $category;
	}

	/*
	|---------------------------------------------------------------------------
	| Collection actions
	|---------------------------------------------------------------------------
	*/

	public function index()
	{
		$categories = $this->category->getAll();

		if(Request::wantsXML()) {
			return Response::view('xml.categories', compact('categories'), 200, [
				'Content-Type' => 'application/xml; charset=UTF-8'
			]);
		}

		return Response::jsonOrJsonp($categories);
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

			$category = $this->category->find($id);

			if(Request::wantsXML()) {
				return Response::view('xml.category', compact('category'), 200, [
					'Content-Type' => 'application/xml; charset=UTF-8'
				]);
			}

			return Response::jsonOrJsonp($category);

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