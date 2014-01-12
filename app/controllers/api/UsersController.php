<?php namespace controllers\api;

use Cardgameapi\Repositories\UserRepositoryInterface;
use Response;
use Input;

class UsersController extends \BaseController {

	protected $user;

	public function __construct(UserRepositoryInterface $user)
	{
		$this->user = $user;
	}

	public function index()
	{
		return $this->user->getAll();
	}

	public function show($id)
	{
		return $this->user->find($id);
	}

	public function create()
	{
		$this->user->create(Input::get('username'));

		return Response::jsonOrJsonp(array(
			'message' => 'User has been succesfully created'
		), 201);
	}

}