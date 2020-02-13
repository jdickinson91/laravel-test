<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseTypeResourceCollection;
use App\Repositories\Interfaces\IResponseTypeRepository;

class ResponseTypeController extends Controller {

    /**
     * @var IResponseTypeRepository
     */
    private $repository;

    /**
     * ResponseTypeController constructor.
     * @param IResponseTypeRepository $repository
     */
    public function __construct(IResponseTypeRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): ResponseTypeResourceCollection {

        return new ResponseTypeResourceCollection($this->repository->getAll());
    }
}
