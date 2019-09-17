<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('image_news', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->primary(['image_id', ['news_id']]);

            $table->bigInteger('news_id')->unsigned()->index();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

            $table->bigInteger('image_id')->unsigned()->index();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');

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
        Schema::dropIfExists('image_news');

    }
}
