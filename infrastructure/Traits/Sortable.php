<?php namespace Infrastructure\Traits;

trait Sortable
{
    public function sort($collection, $sort, $direction)
    {
        if (in_array($sort, $this->sortable)) {
            call_user_func([$collection, 'ofOrder'], $sort, $direction);
        }

        return $collection;
    }
}