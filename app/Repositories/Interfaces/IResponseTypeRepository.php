<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface IResponseTypeRepository {

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findByField($field, $value);
}
