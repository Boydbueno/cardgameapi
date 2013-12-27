<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api'), function() 
{

	Route::group(array('prefix' => 'v0.1'), function()
	{

		/*
		|---------------------------------------------------------------------------
		| Category routes
		|---------------------------------------------------------------------------
		*/

		Route::group(array('prefix' => 'categories'), function()
		{

			/*
			|---------------------------------------------------------------------------
			| Category collection routes
			|---------------------------------------------------------------------------
			*/

			Route::get('/', 'controllers\api\CategoriesController@index');
			Route::post('/', 'controllers\api\CategoriesController@create');

			/*
			|---------------------------------------------------------------------------
			| Not allowed routes
			|---------------------------------------------------------------------------
			*/

			Route::put('/', function() {
				return Response::json(array(
					'message' => 'You are not allowed to send a PUT request to the categories collection. Did you forget to add an id?'
				), 405);
			});

			Route::delete('/', function() {
				return Response::json(array(
					'message' => 'You are not allowed to send a DELETE request to the categories collection. Did you forget to add an id?'
				), 405);
			});
		});
		
	});

});