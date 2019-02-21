<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IResponseTypeRepository;
use Illuminate\Support\Facades\Response;

class ResponseTypeController extends Controller
{
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
    public function index(){
        return Response::json($this->repository->getAll());
    }
}
