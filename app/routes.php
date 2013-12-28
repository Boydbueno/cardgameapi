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
			| Single Categorie routes
			|---------------------------------------------------------------------------
			*/
		
			Route::get('{id}', 'controllers\api\CategoriesController@show');
			Route::put('{id}', 'controllers\api\CategoriesController@update');
			Route::delete('{id}', 'controllers\api\CategoriesController@delete');

			/*
			|---------------------------------------------------------------------------
			| Not allowed routes
			|---------------------------------------------------------------------------
			*/

			Route::put('/', function() {
				return Response::json(array(
					'message' => 'You are not allowed to send a PUT request to this collection. Did you forget to add an id?'
				), 405);
			});

			Route::delete('/', function() {
				return Response::json(array(
					'message' => 'You are not allowed to send a DELETE request to this collection. Did you forget to add an id?'
				), 405);
			});

			Route::post('{id}', function() {
				return Response::json(array(
					'message' => 'You are not allowed to send a POST request to this resource. Did you mean to add a new item to the collection?'
				), 405);
			});

		});

		/*
		|---------------------------------------------------------------------------
		| Question routes
		|---------------------------------------------------------------------------
		*/
	
		Route::group(array('prefix' => 'questions'), function()
		{

			Route::get('/', 'controllers\api\QuestionsController@index');
			Route::post('/', 'controllers\api\QuestionsController@create');

			Route::get('random', 'controllers\api\QuestionsController@random');

			Route::get('{id}', 'controllers\api\QuestionsController@show');

			Route::put('/', function() {
				return Response::json(array(
					'message' => 'You are not allowed to send a PUT request to this collection. Did you forget to add an id?'
				), 405);
			});

			Route::delete('/', function() {
				return Response::json(array(
					'message' => 'You are not allowed to send a DELETE request to this collection. Did you forget to add an id?'
				), 405);
			});

			Route::post('{id}', function() {
				return Response::json(array(
					'message' => 'You are not allowed to send a POST request to this resource. Did you mean to add a new item to the collection?'
				), 405);
			});


		});

		Route::get('categories/{id}/questions', 'controllers\api\QuestionsController@byCategory');
		
	});

});