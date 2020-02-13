<?php

use Illuminate\Database\Seeder;

class WebRequestTableSeeder extends Seeder
{
    /**
     * @var int
     */
    protected $count = 30;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\WebRequest::class, $this->count)->create();
    }
}
