<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expert_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['expert_id', 'locale']);
            $table->foreign('expert_id')->references('id')->on('experts')->cascadeOnDelete();
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
        Schema::dropIfExists('expert_translations');
    }
}
