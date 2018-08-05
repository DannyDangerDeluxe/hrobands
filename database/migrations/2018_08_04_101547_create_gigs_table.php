<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGigsTable extends Migration
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
            $table->string('name', 80);
            $table->string('location', 80);
            $table->string('street', 80);
            $table->string('number', 10);
            $table->string('zip', 10);
            $table->string('city', 80);
            $table->date('date');
            $table->time('open_doors')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->longtext('price', 5000)->nullable();
            $table->string('link', 255)->nullable();
            $table->string('band_one_id')->unsigned()->unique();
            $table->string('band_two_id')->nullable()->unsigned()->unique();
            $table->string('band_three_id')->nullable()->unsigned()->unique();
            $table->string('user_id')->unsigned()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gigs');
    }
}
