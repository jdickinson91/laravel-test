<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\WebRequestByCountryRequest;
use App\Http\Requests\WebRequestDatatableRequest;
use App\Http\Requests\WebRequestTotalStatsRequest;
use App\Http\Resources\WebRequestResourceCollection;
use App\Repositories\Interfaces\IWebRequestRepository;
use Illuminate\Support\Facades\Response;

class WebRequestController extends Controller {

    /**
     * @var IWebRequestRepository
     */
    private $repository;

    /**
     * WebRequestController constructor.
     * @param IWebRequestRepository $repository
     */
    public function __construct(IWebRequestRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * @param WebRequestDatatableRequest $request
     * @return mixed
     */
    public function datatable(WebRequestDatatableRequest $request) {

        return Response::json($this->repository->getDatatableData($request->offset,
                                                   $request->limit,
                                                   $request->sort_col,
                                                   $request->sort_dir,
                                                   $request->response_type_id,
                                                   $request->country_id
        ));
    }

    /**
     * @param WebRequestTotalStatsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTotalStats(WebRequestTotalStatsRequest $request) {

        $filtered_total   = $this->repository->getTotal($request->response_type_id, $request->country_id);
        $unfiltered_total = $this->repository->getTotal();

        return Response::json(['filtered' => $filtered_total, 'unfiltered' => $unfiltered_total]);
    }

    /**
     * @param WebRequestByCountryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRequestsByCountry(WebRequestByCountryRequest $request): WebRequestResourceCollection {

        $webRequests = $this->repository->getRequestsByCountry($request->response_type_id, $request->country_id);

        return new WebRequestResourceCollection($webRequests);
    }
}
