<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchetictureTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archeticture_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archeticture_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['archeticture_id', 'locale']);
            $table->foreign('archeticture_id')->references('id')->on('archetictures')->cascadeOnDelete();
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
        Schema::dropIfExists('archeticture_translations');
    }
}
