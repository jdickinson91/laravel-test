<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface ICountryRepository {

    /**
     * @return Collection
     */
    public function getAll();

    /**
     * @param $id
     */
    public function get($id);

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findByField($field, $value);
}
