<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent {

	public function questions() 
	{
		return $this->hasMany('Question');
	}

}