<?php namespace controllers\api;

use Category;

class CategoriesController extends \BaseController {

	public function getIndex()
	{
		return Category::all();
	}

}