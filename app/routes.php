<?php

Route::group(['prefix' => 'api/v1', 'namespace' => 'controllers\api'], function()
{

	Route::post('games', function()
	{
		$game = new Game;
		$game->save();
		$response = Response::jsonOrJsonp($game, 201);
		$response->header('Location', '/games/' . $game->id);
		
		return $response;
	});

	/*
	|---------------------------------------------------------------------------
	| Category routes
	|---------------------------------------------------------------------------
	*/

	# Category collection routes
	Route::get('categories', 'CategoriesController@index');
	Route::post('categories', 'CategoriesController@create');

	# Single Categorie routes
	Route::get('categories/{id}', 'CategoriesController@show');
	Route::put('categories/{id}', 'CategoriesController@update');
	Route::delete('categories/{id}', 'CategoriesController@delete');

	# Not allowed routes
	Route::put('categories', function() {
		return Response::jsonOrJsonp(array(
			'message' => 'You are not allowed to send a PUT request to this collection. Did you forget to add an id?'
		), 405);
	});

	Route::delete('categories', function() {
		return Response::jsonOrJsonp(array(
			'message' => 'You are not allowed to send a DELETE request to this collection. Did you forget to add an id?'
		), 405);
	});

	Route::post('categories/{id}', function() {
		return Response::jsonOrJsonp(array(
			'message' => 'You are not allowed to send a POST request to this resource. Did you mean to add a new item to the collection?'
		), 405);
	});

	/*
	|---------------------------------------------------------------------------
	| Question routes
	|---------------------------------------------------------------------------
	*/

	# Question collection routes
	Route::get('questions', 'QuestionsController@index');
	Route::post('questions', 'QuestionsController@create');

	# Single question routes
	Route::get('questions/{id}', ['as' => 'question.show', 'uses' => 'QuestionsController@show']);
	Route::get('categories/{id}/questions', 'QuestionsController@byCategory');
	Route::delete('questions/{id}', 'QuestionsController@delete');

	# Random question
	Route::get('questions/random', 'QuestionsController@random');
	# Random question 
	Route::get('categories/{id}/questions/random', 'QuestionsController@randomByCategory');

	# Not allowed routes
	Route::put('questions', function() {
		return Response::jsonOrJsonp(array(
			'message' => 'You are not allowed to send a PUT request to this collection. Did you forget to add an id?'
		), 405);
	});

	Route::delete('questions', function() {
		return Response::jsonOrJsonp(array(
			'message' => 'You are not allowed to send a DELETE request to this collection. Did you forget to add an id?'
		), 405);
	});

	Route::post('questions/{id}', function() {
		return Response::jsonOrJsonp(array(
			'message' => 'You are not allowed to send a POST request to this resource. Did you mean to add a new item to the collection?'
		), 405);
	});

	/*
	|---------------------------------------------------------------------------
	| User routes
	|---------------------------------------------------------------------------
	*/

	Route::get('users', 'UsersController@index');
	Route::post('users', 'UsersController@create');

	Route::get('users/{id}', ['as' => 'user.show', 'uses' => 'UsersController@show']);

	Route::get('users/{id}/questions', 'QuestionsController@byUser');

	
});