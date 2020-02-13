<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\ResponseTypeController;
use App\Models\ResponseType;
use Illuminate\Http\JsonResponse;
use Tests\BaseTestClass;

class ResponseTypeControllerTest extends BaseTestClass {

    /**
     * @setUp
     */
    protected function setUp() {
        parent::setUp();

        $this->makeClass(ResponseTypeController::class);
    }

    /**
     * @see ResponseTypeController::index()
     * @test
     */
    public function testIndex(){

        $expected = ResponseType::orderBy('code', 'asc')->get();

        $result = $this->class->index();

        $this->assertInstanceOf(JsonResponse::class, $result);

        $result = $result->getData();

        foreach($result as $k => $v){
            $this->assertInstance($v, $expected[$k]);
        }
    }
}
