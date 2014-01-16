<?php namespace controllers\api;

use Cardgameapi\Repositories\UserRepositoryInterface;
use Response;
use Request;
use Input;

class UsersController extends \BaseController {

	protected $user;

	public function __construct(UserRepositoryInterface $user)
	{
		$this->user = $user;
	}

	public function index()
	{

		$users = $this->user->getAll(Input::get('limit'), Input::get('offset'));

		if(Request::wantsXML()) {
			return Response::view('xml.users', compact('users'), 200, [
				'Content-Type' => 'application/xml; charset=UTF-8'
			]);
		}

		return Response::jsonOrJsonp($users);
	}

	public function show($id)
	{
		$user = $this->user->find($id);

		if(!Request::wantsXML()) {
			return Response::view('xml.user', compact('user'), 200, [
				'Content-Type' => 'application/xml; charset=UTF-8'
			]);
		}

		return Response::jsonOrJsonp($user);
	}

	public function create()
	{
		$user = $this->user->create(Input::get('username'));

		return Response::jsonOrJsonp($user, 201, [
			'location' => route('user.show', ['id' => $user->id])
		]);
	}

}