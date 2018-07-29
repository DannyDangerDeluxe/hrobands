<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('gigs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('organizer');
            $table->string('location');
            $table->string('date');
            $table->integer('time');
            $table->integer('price');
            $table->integer('website');
            $table->integer('description');
            $table->integer('image_path');
            $table->integer('image_alt');
        }
        */

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->integer('band_id')->nullable()->unsigned()->unique();
            $table->integer('image_id')->nullable()->unsigned()->unique();
            /*
            $table->foreign('band_id')
                ->references('id')
                ->on('bands')
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
        Schema::dropIfExists('users');
        // 
    }
}
