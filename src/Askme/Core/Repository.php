<?php namespace Askme\Core;

use Askme\Domain\Repository as RepositoryContract;
use Infrastructure\Traits\BuildsQueries;

class Repository implements RepositoryContract
{
    use BuildsQueries;

    protected $model;

    /**
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllItems()
    {
        return $this->builder()->get();
    }
}