<?php namespace Cardgameapi\Repositories;

interface QuestionRepositoryInterface {

	public function __construct(CategoryRepositoryInterface $category, UserRepositoryInterface $user);
	public function getAll();
	public function find($id);
	public function random();
	public function findByCategory($id);
	public function randomByCategory($id);
	public function findByUser($id);
	public function create($question, $userid, Array $answers, Array $categories);

}