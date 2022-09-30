<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngineeringOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineering_offices', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('phone');
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->enum('stauts',['0','1'])->default('0');
            $table->timestamps();
        });
        Schema::create('city_engineering_office', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained()->cascadeOnDelete();
            $table->foreignId('engineering_office_id')->constrained()->cascadeOnDelete();
        });



        

        Schema::create('engineering_office_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('engineering_office_id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('locale')->index();
            //$table->unique(['engineering_office_id', 'locale']);
            //$table->foreign('engineering_office_id')->references('id')->on('engineering_offices')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engineering_office_translations');
        Schema::dropIfExists('city_engineering_office');
        Schema::dropIfExists('engineering_offices');
    }
}
