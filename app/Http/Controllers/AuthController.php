<?php namespace App\Http\Controllers;

use App\Services\Askme\Facades\Question;
use Auth;
use EllipseSynergie\ApiResponse\Laravel\Response;
use Input;

class AuthController extends ApiController
{
	private $response;

	public function __construct(Response $response)
	{
		$this->response = $response;
	}

	/**
	 * @return \Illuminate\Contracts\Routing\ResponseFactory
	 */
	public function postLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(['email' => $email, 'password' => $password])) {
			return $this->respondWithSuccess(['user' => \Auth::user()], 'Logged In');
		} else {
			return $this->respondWithErrors(['Invalid email and password combination.']);
		}
	}

	/**
	 * @return \Illuminate\Contracts\Routing\ResponseFactory
	 */
	public function postLogout()
	{
		\Auth::logout();
		return $this->respondWithSuccess([], 'Logged Out');
	}
}
