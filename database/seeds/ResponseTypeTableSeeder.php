<?php

use Illuminate\Database\Seeder;

class ResponseTypeTableSeeder extends Seeder
{
    /**
     * @return mixed
     */
    public function run()
    {
        $http_status_codes = \Symfony\Component\HttpFoundation\Response::$statusTexts;

        $response_types_data = [];
        foreach($http_status_codes as $k => $v){
            $response_types_data[] = [
                'name' => $v,
                'code' => $k
            ];
        }

        return \App\Models\ResponseType::insert($response_types_data);
    }
}
