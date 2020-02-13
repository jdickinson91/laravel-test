<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        //Wrap the seeder in a transaction to avoid a part seeded database
        \DB::transaction(function(){
            $this->call(DevSeeder::class);
            $this->call(WebRequestTableSeeder::class);
        });
    }
}
