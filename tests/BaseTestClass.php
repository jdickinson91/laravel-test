<?php

namespace Tests;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class BaseTestClass extends TestCase {

    /**
     * @var
     */
    protected $class;

    /**
     * NOTE: Start a transaction on setup and roll it back on the teardown.
     * This is to stop the database being flooded with data during development.
     */

    /**
     * @setUp
     */
    protected function setUp() {
        parent::setUp();

        \DB::beginTransaction();
    }

    /**
     * @tearDown
     */
    protected function tearDown() {

        \DB::rollback();
        parent::tearDown();
    }

    /**
     * @param string $class
     */
    protected function makeClass(string $class){
        $this->class = App::make($class);
    }

    /**
     * Test model instances
     * @param $actual
     * @param $expected
     */
    protected function assertInstance($actual, $expected){

        if(!is_array($expected)){
            $expected = $expected->toArray();
        }

        foreach($expected as $key=>$val){

            self::assertTrue(isset($actual->$key) || is_null($actual->$key));
            if(isset($val))
            {
                if($actual->$key instanceof Carbon)
                {
                    self::assertEquals($val, $actual->$key);
                }
                else
                {
                    self::assertSame($val, $actual->$key);
                }
            }

        }
    }
}
