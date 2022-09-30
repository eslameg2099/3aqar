<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptioncustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optioncustoms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->foreignId('cutom_id');
            $table->string('type');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');            
            $table->foreign('cutom_id')->references('id')->on('custom_fields')->onDelete('cascade');            
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
        Schema::dropIfExists('optioncustoms');
    }
}
