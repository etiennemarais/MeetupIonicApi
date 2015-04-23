<?php namespace Askme\Domain\Questions;

interface QuestionsService
{
    /**
     * @return mixed
     */
    public function getAllQuestions();
}