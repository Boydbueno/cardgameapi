<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api'), function() 
{

	Route::group(array('prefix' => 'v0.1'), function()
	{

		Route::group(array('prefix' => 'categories'), function()
		{
			Route::get('/', 'controllers\api\CategoriesController@getIndex');
			Route::post('/', 'controllers\api\CategoriesController@postIndex');
			Route::put('/', 'controllers\api\CategoriesController@putIndex');
			Route::delete('/', 'controllers\api\CategoriesController@deleteIndex');

			Route::get('{id}', 'controllers\api\CategoriesController@getShow');
		});
		
	});

});