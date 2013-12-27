<?php namespace controllers\api;

use Question;

class QuestionsController extends \BaseController {

	public function index() {
		return Question::all();
	}

	public function show($id) {
		return "Question with id of {$id}";
	}

}