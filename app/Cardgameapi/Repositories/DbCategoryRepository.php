<?php namespace Cardgameapi\Repositories;

use Category;

class DbCategoryRepository implements CategoryRepositoryInterface 
{

	public function getAll()
	{
		return Category::all();
	}

	public function find($id)
	{
		return Category::findOrFail($id);
	}

}