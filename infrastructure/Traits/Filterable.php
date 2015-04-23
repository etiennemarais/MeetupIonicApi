<?php namespace Infrastructure\Traits;

trait Filterable
{
    public function filter($collection, $filters)
    {
        foreach($filters as $key => $value) {
            if (in_array($key, $this->filterable)) {
                call_user_func([$collection, 'of' . ucfirst($key)], $value);
            }
        }

        return $collection;
    }
}