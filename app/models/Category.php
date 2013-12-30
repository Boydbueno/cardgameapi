<?php

class Category extends Eloquent {
	
	public function questions()
	{
		return $this->belongsToMany('Question');
	}

}