<?php namespace controllers\api;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Question;
use Response;

class QuestionsController extends \BaseController {

	public function index() {
		return Question::all();
	}

	public function show($id) {
		try {
			return Question::findOrFail($id);
		} catch(ModelNotFoundException $e) {
		    return Response::json(array(
		    	'message' => 'This resource does not exist. Possibly the resource has been deleted, please double check the id'
	    	), 404);
		}
	}

}