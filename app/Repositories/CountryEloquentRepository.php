<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\Interfaces\ICountryRepository;
use Illuminate\Support\Collection;

class CountryEloquentRepository implements ICountryRepository {

    /**
     * @var Country
     */
    private $model;

    /**
     * CountryRepository constructor.
     * @param Country $model
     */
    public function __construct(Country $model) {
        $this->model = $model;
    }

    public function getAll(): Collection {

        return $this->model->orderBy('name', 'asc')->get();
    }

    /**
     * @param $id
     * @return Country
     */
    public function get($id): Country {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findByField($field, $value) {
        return $this->model->where($field, $value)->first();
    }
}
