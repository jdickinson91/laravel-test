<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\CountryController;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Tests\BaseTestClass;

class CountryControllerTest extends BaseTestClass {

    /**
     * @setUp
     */
    protected function setUp() {
        parent::setUp();

        $this->makeClass(CountryController::class);
    }

    /**
     * @see CountryController::index()
     * @test
     */
    public function testIndex(){

        $expected = Country::orderBy('name', 'asc')->get();

        $result = $this->class->index();

        $this->assertInstanceOf(JsonResponse::class, $result);

        $result = $result->getData();

        foreach($result as $k => $v){

            $this->assertInstance($v, $expected[$k]);
        }
    }
}
