<?php

use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::transaction(function(){
            $this->call(CountriesSeeder::class);
            $this->call(ResponseTypeTableSeeder::class);
        });
    }
}
