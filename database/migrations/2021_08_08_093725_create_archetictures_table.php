<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArcheticturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archetictures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->unsigned();
            $table->foreignId('category_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('category_archetictures')->cascadeOnDelete();
            $table->string('video')->nullable();
            $table->timestamps();
            $table->softDeletes();

            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archetictures');
    }
}
