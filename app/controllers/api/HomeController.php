<?php namespace controllers\api;

use View;

class HomeController extends \BaseController {

	public function index()
	{
		return View::make('documentation');
	}

}