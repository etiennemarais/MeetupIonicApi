<?php namespace Askme\Domain\Recommendations;

use Illuminate\Database\Eloquent\Model;

class Recommend extends Model
{
    protected $table = 'recommendations';

    protected $fillable = [
        'recommendation',
    ];
}