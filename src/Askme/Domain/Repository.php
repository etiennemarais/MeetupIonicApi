<?php namespace Askme\Domain;

interface Repository
{
    /**
     * @return mixed
     */
    public function getAllItems();
}