<?php namespace App\Http\Controllers;

use App\Services\Askme\Facades\Question;
use EllipseSynergie\ApiResponse\Laravel\Response;

class WelcomeController extends ApiController
{
	private $response;

	public function __construct(Response $response)
	{
		$this->response = $response;
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}

	/**
	 * @return \Illuminate\Contracts\Routing\ResponseFactory
	 */
	public function getQuestions()
	{
		$questions = Question::getAllQuestions();

		return $this->response->withArray([
			'status' => 'success',
			'data' => $questions,
		]);
	}

}
