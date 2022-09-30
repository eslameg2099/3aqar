<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRrquestArcheticturesTable extends Migration
{
   
    
    public function up()
    {
        Schema::create('rrquest_archetictures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->foreignId('user_id');
            $table->text('description');
            $table->text('comment')->nullable();
            $table->string('space');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');            
            $table->foreign('type_id')->references('id')->on('types')->cascadeOnDelete();
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
        Schema::dropIfExists('rrquest_archetictures');
    }
}
