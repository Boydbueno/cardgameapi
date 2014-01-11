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

Response::macro('XML', function($value, $statusCode = 200, $headers = [])
{
	$data = $value->toArray();

	return Cardgameapi\XML\XML::create($data);
});