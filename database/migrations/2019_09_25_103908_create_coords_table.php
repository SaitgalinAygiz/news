<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coords', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('news_id');
            $table->double('address_longitude')->default('54.72405461');
            $table->double('address_latitude')->default('55.94686377');

            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

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
        Schema::dropIfExists('coords');
    }
}
