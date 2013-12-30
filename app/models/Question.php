<?php

class Question extends Eloquent {
	
	public function categories()
	{
		return $this->belongsToMany('Category');
	}

}