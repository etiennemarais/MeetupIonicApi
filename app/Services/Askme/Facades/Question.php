<?php namespace App\Services\Askme\Facades;

use Illuminate\Support\Facades\Facade;

class Question extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Askme\Domain\Questions\QuestionsService';
    }
}