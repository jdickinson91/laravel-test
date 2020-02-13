<?php

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;

interface IWebRequestRepository {

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
     * @param int $offset
     * @param int $limit
     * @param string $sort_col
     * @param string $sort_dir
     * @param int $response_type_id
     * @param int $country_id
     * @return mixed
     */
    public function getDatatableData($offset = 0, $limit = 0, $sort_col = 'id', $sort_dir = 'asc', $response_type_id = 0, $country_id = 0);

    /**
     * @param int $response_type_id
     * @param int $country_id
     * @return mixed
     */
    public function getTotal($response_type_id = 0, $country_id = 0);

    /**
     * @param array $data
     * @return mixed
     */
    public function insert(array $data);

    /**
     * @param int $response_type_id
     * @param int $country_id
     * @return mixed
     */
    public function getRequestsByCountry($response_type_id = 0, $country_id = 0);
}
