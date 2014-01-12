<?php namespace Cardgameapi\Repositories;

use User;

class DbUserRepository implements UserRepositoryInterface {

	public function getAll()
	{
		return User::all();
	}

	public function find($id)
	{
		return User::find($id);
	}

	public function create($username)
	{
		// Some validation here

		$user = new User;
		$user->username = $username;
		$user->save();

		return $user;
	}

}