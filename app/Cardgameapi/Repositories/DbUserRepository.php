<?php namespace Cardgameapi\Repositories;

use User;

class DbUserRepository implements UserRepositoryInterface {

	public function getAll($limit = 20, $offset = 0)
	{
		$users = new User;

		if($limit) $users = $users->take($limit);
		if($offset) $users = $users->skip($offset);

		return $users->get();
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