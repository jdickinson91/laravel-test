<?php

namespace App\Repositories;

use App\Models\ResponseType;
use App\Repositories\Interfaces\IResponseTypeRepository;
use Illuminate\Support\Collection;

class ResponseTypeEloquentRepository implements IResponseTypeRepository {

    /**
     * @var ResponseType
     */
    private $model;

    /**
     * ResponseTypeEloquentRepository constructor.
     * @param ResponseType $model
     */
    public function __construct(ResponseType $model) {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection {
        return $this->model->orderBy('code', 'asc')->get();
    }

    /**
     * @param $id
     * @return ResponseType
     */
    public function get($id): ResponseType {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findByField($field, $value){
        return $this->model->where($field, $value)->first();
    }
}
