<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('website')->nullable();
            $table->year('founded')->nullable();
            $table->longText('description')->nullable();
            $table->integer('genre_id')->nullable()->unsigned()->unique();
            $table->integer('image_media_id')->nullable()->unsigned()->unique();

            /*
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade');
            $table->foreign('image_media_id')
                ->references('id')
                ->on('media')
                ->onDelete('cascade');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bands');
    }
}
