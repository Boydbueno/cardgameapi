<?php

Route::group(['prefix' => 'api/v1', 'namespace' => 'controllers\api'], function()
{

	# Documentation
	Route::get('/', 'HomeController@index');

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
		return Response::error('You are not allowed to send a PUT request to this collection. Did you forget to add an id?', 405);
	});

	Route::delete('categories', function() {
		return Response::error('You are not allowed to send a DELETE request to this collection. Did you forget to add an id?', 405);
	});

	Route::post('categories/{id}', function() {
		return Response::error('You are not allowed to send a POST request to this resource. Did you mean to add a new item to the collection?', 405);
	});

	/*
	|---------------------------------------------------------------------------
	| Question routes
	|---------------------------------------------------------------------------
	*/

	# Question collection routes
	Route::get('questions', 'QuestionsController@index');
	Route::get('users/{id}/questions', 'QuestionsController@byUser');
	Route::get('categories/{id}/questions', 'QuestionsController@byCategory');

	# Single question routes
	Route::get('questions/{id}', ['as' => 'question.show', 'uses' => 'QuestionsController@show']);

	# Random question routes
	Route::get('questions/random', 'QuestionsController@random');
	Route::get('categories/{id}/questions/random', 'QuestionsController@randomByCategory');

	# Create new question
	Route::post('questions', 'QuestionsController@create');

	# Delete question
	Route::delete('questions/{id}', 'QuestionsController@delete');

	# Not allowed routes
	Route::put('questions', function() {
		return Response::error('You are not allowed to send a PUT request to this collection. Did you forget to add an id?', 405);
	});

	Route::delete('questions', function() {
		return Response::error('You are not allowed to send a DELETE request to this collection. Did you forget to add an id?', 405);
	});

	Route::post('questions/{id}', function() {
		return Response::error('You are not allowed to send a POST request to this resource. Did you mean to add a new item to the collection?', 405);
	});

	/*
	|---------------------------------------------------------------------------
	| User routes
	|---------------------------------------------------------------------------
	*/

	# Users collection route
	Route::get('users', 'UsersController@index');

	# Single User route
	Route::get('users/{id}', ['as' => 'user.show', 'uses' => 'UsersController@show']);
	
	# Create new user
	Route::post('users', 'UsersController@create');
});