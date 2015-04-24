<?php namespace App\Http\Controllers;

use App\Services\Askme\Facades\Question;
use Askme\Domain\Recommendations\Recommend;
use EllipseSynergie\ApiResponse\Laravel\Response;

class WelcomeController extends ApiController
{
	private $response;

	public function __construct(Response $response)
	{
		$this->response = $response;
		$this->middleware('App\Http\Middleware\Cors');
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

	/**
	 * @return \Illuminate\Contracts\Routing\ResponseFactory
	 */
	public function postAnswers()
	{
		$recommends = Recommend::All();

		$data = [
			'status' => 'success',
			'data' => [
				'suggestion' => $recommends[0],
				'alternatives' => [
					$recommends[1],
					$recommends[2],
					$recommends[3],
				],
			],
		];

		return $this->response->withArray($data);
	}
}
