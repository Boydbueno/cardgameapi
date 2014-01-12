<?php namespace Cardgameapi\Repositories;

interface UserRepositoryInterface {

	public function getAll();
	public function find($id);
	public function create($username);

}