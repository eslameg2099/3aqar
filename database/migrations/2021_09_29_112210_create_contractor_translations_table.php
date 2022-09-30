<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contractor_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('locale')->index();
            $table->unique(['contractor_id', 'locale']);
            $table->foreign('contractor_id')->references('id')->on('contractors')->cascadeOnDelete();
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
        Schema::dropIfExists('contractor_translations');
    }
}
