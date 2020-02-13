<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\WebRequestController;
use App\Http\Requests\WebRequestDatatableRequest;
use App\Http\Requests\WebRequestTotalStatsRequest;
use App\Models\ResponseType;
use App\Models\WebRequest;
use Illuminate\Http\JsonResponse;
use Tests\BaseTestClass;

class WebRequestTest extends BaseTestClass {

    /**
     * @setUp
     */
    public function setUp() {
        parent::setUp();

        $this->makeClass(WebRequestController::class);
    }

    /**
     * @see WebRequestController::getTotalStats()
     * @test
     */
    public function testTotalStats() {

        $response_type = ResponseType::inRandomOrder()->first();
        $country       = ResponseType::inRandomOrder()->first();

        $request = new WebRequestTotalStatsRequest(['response_type_id' => $response_type->id, 'country_id' => $country->id]);
        $result  = $this->class->getTotalStats($request);

        $this->assertInstanceOf(JsonResponse::class, $result);

        $result = $result->getData();

        $expected_filtered   = WebRequest::where('response_type_id', $response_type->id)->where('country_id', $country->id)->count();
        $expected_unfiltered = WebRequest::count();

        $this->assertObjectHasAttribute('filtered', $result);
        $this->assertObjectHasAttribute('unfiltered', $result);

        $this->assertSame($expected_filtered, $result->filtered);
        $this->assertSame($expected_unfiltered, $result->unfiltered);
    }

    /**
     * @see WebRequestController::datatable()
     * @test
     */
    public function testDatatable() {

        $response_type = ResponseType::inRandomOrder()->first();
        $country       = ResponseType::inRandomOrder()->first();

        $request_options = [
            'offset'           => 0,
            'limit'            => 10,
            'response_type_id' => $response_type->id,
            'country_id'       => $country->id,
            'sort_col'         => 'id',
            'sort_dir'         => 'asc'
        ];

        $request = new WebRequestDatatableRequest($request_options);

        $result = $this->class->datatable($request);

        $this->assertInstanceOf(JsonResponse::class, $result);
    }
}
