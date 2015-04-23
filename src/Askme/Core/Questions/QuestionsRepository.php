<?php namespace Askme\Core\Questions;

use Askme\Core\Repository;
use Askme\Domain\Questions\Question;
use Askme\Domain\Questions\QuestionsRepository as QuestionsRepositoryContract;

class QuestionsRepository extends Repository implements QuestionsRepositoryContract
{
    /**
     * @param Question $model
     */
    public function __construct(Question $model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getAllQuestions()
    {
        return $this->builder()->with('answers')->get();
    }
}