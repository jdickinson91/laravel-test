<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountryResourceCollection;
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
    public function index(): CountryResourceCollection{

        return new CountryResourceCollection($this->repository->getAll());
    }
}
