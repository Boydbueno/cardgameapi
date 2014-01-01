<?php namespace Cardgameapi\Repositories;

interface QuestionRepositoryInterface {

	public function getAll();
	public function find($id);
	public function random();
	public function findByCategory($id);
	public function randomByCategory($id);

}