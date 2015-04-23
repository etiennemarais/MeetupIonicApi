<?php namespace App\Services\Askme\Questions;

use App\Services\Askme\Service;
use Askme\Domain\Questions\QuestionsRepository;
use Askme\Domain\Questions\QuestionsService as QuestionsServiceContract;

class QuestionsService extends Service implements QuestionsServiceContract
{
    private $questionsRepository;

    /**
     * @param QuestionsRepository $questionsRepository
     */
    public function __construct(QuestionsRepository $questionsRepository)
    {
        $this->questionsRepository = $questionsRepository;
    }

    /**
     * @return mixed
     */
    public function getAllQuestions()
    {
        try {
            return $this->questionsRepository->getAllQuestions();
        } catch (\Exception $e) {
            $this->handle($e);
        }
    }
}