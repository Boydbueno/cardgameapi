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

Response::macro('error', function($message, $statusCode = 400)
{
	if(Request::wantsXML()) {
		return Response::view('xml.error', compact('message'), $statusCode, [
			'Content-Type' => 'application/xml; charset=UTF-8'
		]);
	}

	return Response::jsonOrJsonp(array(
		'message' => $message
	), 400);
});