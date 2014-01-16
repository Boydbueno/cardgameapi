<?php namespace Cardgameapi\Repositories;

interface QuestionRepositoryInterface {

	public function __construct(CategoryRepositoryInterface $category, UserRepositoryInterface $user);
	public function getAll($limit, $offset);
	public function find($id);
	public function random();
	public function search($query, $limit, $offset);
	public function findByCategory($id, $limit, $offset);
	public function randomByCategory($id);
	public function findByUser($id, $limit, $offset);
	public function create($question, $userid, Array $answers, Array $categories);
	public function delete($id);

}