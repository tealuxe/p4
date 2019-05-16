<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('sheet_id')->unsigned();
            $table->foreign('sheet_id')->references('id')->on('sheets')->onDelete('cascade');
            $table->integer('user_id');
            $table->string('filename');
            $table->string('thumbnail_filename')->nullable();

            $table->text('comment')->nullable();

            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('mimetype')->nullable();
            $table->string('exposure_time')->nullable();
            $table->string('f_number')->nullable();
            $table->string('iso_speed_ratings')->nullable();
            $table->string('film_type')->nullable();
            $table->string('developer')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
