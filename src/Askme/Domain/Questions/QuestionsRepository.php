<?php namespace Askme\Domain\Questions;

interface QuestionsRepository
{
    /**
     * @return mixed
     */
    public function getAllQuestions();
}