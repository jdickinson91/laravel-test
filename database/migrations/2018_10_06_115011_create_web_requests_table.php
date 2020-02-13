<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('response_type_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->ipAddress('ip');
            $table->integer('response_time');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_requests');
    }
}
