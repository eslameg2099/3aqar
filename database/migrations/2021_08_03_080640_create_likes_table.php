<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->Increments('id');
            $table->foreignId('user_id')->unsigned();
            $table->foreignId('estate_id')->unsigned();
            $table->enum('like',['0','1']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
            $table->foreign('estate_id')->references('id')->on('estates')->onDelete('cascade');            
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
        Schema::dropIfExists('likes');
    }
}
