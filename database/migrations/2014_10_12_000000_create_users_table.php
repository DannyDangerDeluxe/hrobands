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

        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->string('alt');
            $table->string('undertitle');
            $table->integer('media_id')->unsigned()->unique();
            $table->integer('gigs_id')->unsigned()->unique();
        }

        Schema::create('bands', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('genre')->unique();
            $table->string('founded');
            $table->string('website');
            $table->string('text');
            $table->integer('media_id')->unsigned()->unique();
            $table->integer('gigs_id')->unsigned()->unique();

            $table->foreign('media_id')
                ->references('id')
                ->on('bands')
                ->onDelete('cascade');
        }

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('band_id')->unsigned()->unique();

            $table->foreign('band_id')
                ->references('id')
                ->on('bands')
                ->onDelete('cascade');
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
    }
}
