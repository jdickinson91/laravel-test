<?php

namespace Tests\Unit\Commands;

use Tests\BaseTestClass;

class WebRequestImportTest extends BaseTestClass {

    /**
     * @see WebRequestImportTest
     */
    public function test(){

        $result = $this->artisan('web-request:import');
    }
}
