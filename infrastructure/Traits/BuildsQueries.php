<?php namespace Infrastructure\Traits;

trait BuildsQueries
{
    protected $builder;

    /**
     * Create a new Builder object.
     *
     * @return \Infrastructure\Traits\BuildsQueries
     */
    public function builder()
    {
        $this->builder = $this->model->query();

        return $this;
    }

    /**
     * Adds a relationship to the Builder object.
     *
     * @param $relationship
     *
     * @return \Infrastructure\Traits\BuildsQueries
     */
    public function with($relationship)
    {
        $this->builder = $this->model->with($relationship);

        return $this;
    }

    /**
     * Adds filtering to the Builder object.
     *
     * @param $filters
     *
     * @return \Infrastructure\Traits\BuildsQueries
     */
    public function filter($filters)
    {
        $this->builder = $this->model->filter($this->builder, $filters);

        return $this;
    }

    /**
     * Adds sorting to the Builder object.
     *
     * @param $sort
     * @param $direction
     *
     * @return \Infrastructure\Traits\BuildsQueries
     */
    public function sort($sort, $direction)
    {
        $this->builder = $this->model->sort($this->builder, $sort, $direction);

        return $this;
    }

    /**
     * Returns a collection.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function get()
    {
        return $this->builder->get();
    }

    /**
     * Returns a paginated collection.
     *
     * @param $limit
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($limit)
    {
        return $this->builder->paginate($limit);
    }

    /**
     * @param string $field
     * @param string $expression
     * @param string $value
     *
     * @return mixed
     */
    public function where($field, $expression, $value)
    {
        return $this->builder->where($field, $expression, $value);
    }
}
