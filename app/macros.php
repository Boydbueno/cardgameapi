<?php

Response::macro('jsonOrJsonp', function($value, $statusCode = "200", $headers = []) 
{
	$response = Response::json($value, $statusCode);

	if(Input::get('callback'))
		$response->setCallback(Input::get('callback'));

	foreach($headers as $key => $header)
		$response->header($key, $header);

	return $response;
});
