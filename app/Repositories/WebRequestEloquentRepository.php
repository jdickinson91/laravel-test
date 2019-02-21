<?php

namespace App\Repositories;

use App\Models\WebRequest;
use App\Repositories\Interfaces\IWebRequestRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class WebRequestEloquentRepository implements IWebRequestRepository {

    /**
     * @var WebRequest
     */
    private $model;

    /**
     * WebRequestEloquentRepository constructor.
     * @param WebRequest $model
     */
    public function __construct(WebRequest $model) {
        $this->model = $model;
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection {
        return $this->model->all();
    }

    /**
     * @param $id
     * @return WebRequest
     */
    public function get($id): WebRequest {
        return $this->model->findOrFail($id);
    }

    /**
     * @param int $offset
     * @param int $limit
     * @param string $sort_col
     * @param string $sort_dir
     * @param int $response_type_id
     * @param int $country_id
     * @return Collection
     */
    public function getDatatableData($offset = 0, $limit = 0, $sort_col = 'id', $sort_dir = 'asc', $response_type_id = 0, $country_id = 0) {

        $query = $this->getQuery($response_type_id, $country_id);

        $query->orderBy($sort_col, $sort_dir)
              ->join('response_types', 'response_types.id', '=', 'web_requests.response_type_id')
              ->join('countries', 'countries.id', '=', 'web_requests.country_id')
              ->select('web_requests.*')
              ->with(['responseType', 'country']);


        if ($offset) {
            $query->skip($offset);
        }

        if ($limit) {
            $query->take($limit);
        }

        return $query->get();
    }

    /**
     * @param int $response_type_id
     * @param int $country_id
     * @return int
     */
    public function getTotal($response_type_id = 0, $country_id = 0) {

        $query = $this->getQuery($response_type_id, $country_id);
        return $query->count();
    }

    /**
     * @param int $response_type_id
     * @param int $country_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function getQuery($response_type_id = 0, $country_id = 0): Builder {

        $query = $this->model->query();

        if ($response_type_id) {
            $query->where('response_type_id', $response_type_id);
        }

        if ($country_id = 0) {
            $query->where('country_id', $country_id);
        }

        return $query;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function insert(array $data) {
        return $this->model->insert($data);
    }

    /**
     * @param int $response_type_id
     * @param int $country_id
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getRequestsByCountry($response_type_id = 0, $country_id = 0) {

        $select = 'count(web_requests.country_id) as value,
                   countries.name as name';

        $query = $this->getQuery($response_type_id, $country_id);
        $query->selectRaw($select)
              ->join('response_types', 'response_types.id', '=', 'web_requests.response_type_id')
              ->join('countries', 'countries.id', '=', 'web_requests.country_id')
              ->orderBy('value', 'desc')
              ->groupBy('countries.id');

        return $query->get();
    }
}
