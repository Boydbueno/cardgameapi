<?php

class Answer extends Eloquent {

	protected $fillable = ['answer'];

	public function question()
	{
		return $this->belongsTo('Question');
	}

}