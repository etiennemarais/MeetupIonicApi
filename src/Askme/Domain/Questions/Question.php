<?php namespace Askme\Domain\Questions;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'question',
    ];

    public function answers()
    {
        return $this->hasMany('Askme\Domain\Answers\Answer', 'question_id', 'id');
    }
}