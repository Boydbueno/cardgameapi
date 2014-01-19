<?php

class Question extends Eloquent {

	protected $hidden = ['pivot'];
	
	public function categories()
	{
		return $this->belongsToMany('Category');
	}

	public function answers()
	{
		return $this->hasMany('Answer');
	}

	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

}