<?php namespace Cardgameapi\Repositories;

interface UserRepositoryInterface {

	public function getAll($limit, $offset);
	public function find($id);
	public function create($username);

}