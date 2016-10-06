<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('Topics', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('topicname', 100)->unique();
            $table->timestamps();
        });
        Schema::create('Blocks', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 100);
            $table->longText('content', 100);
            $table->string('imagePath', 100);
            $table->integer('topicid')->unsigned();
            $table->foreign('topicyid')->references('id')->on('Topics')->onDelete('cascade');
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
        Schema::drop('blocks');
        Schema::drop('Topics');
    }
}
