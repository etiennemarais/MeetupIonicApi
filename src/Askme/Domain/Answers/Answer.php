<?php namespace Askme\Domain\Answers;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    protected $fillable = [
        'answer',
    ];

    public function question()
    {
        return $this->belongsTo('Askme\Domain\Questions\Question', 'question_id');
    }
}