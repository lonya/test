<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Countries', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('country', 100)->unique();
            $table->timestamps();
        });
        Schema::create('Citis', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('city', 100)->unique();
            $table->integer('countryid')->unsigned();
            $table->foreign('countryid')->references('id')->on('Countries')->onDelete('cascade');
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
        Schema::drop('Citis');
        Schema::drop('Countries');
    }
}
