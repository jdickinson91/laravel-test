<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ICountryRepository;
use Illuminate\Support\Facades\Response;

class CountryController extends Controller
{
    /**
     * @var ICountryRepository
     */
    private $repository;

    /**
     * CountryController constructor.
     * @param ICountryRepository $repository
     */
    public function __construct(ICountryRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        return Response::json($this->repository->getAll());
    }
}
