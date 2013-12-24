<?php

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api'), function() 
{

	Route::group(array('prefix' => 'v0.1'), function()
	{

		Route::controller('categories', 'controllers\api\CategoriesController');
		
	});

});