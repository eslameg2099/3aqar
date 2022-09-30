<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->enum('active',['0','1'])->default('1');

            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('type_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->string('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['type_id', 'locale']);
            $table->foreign('type_id')->references('id')->on('types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_translations');
        Schema::dropIfExists('types');
    }
}
