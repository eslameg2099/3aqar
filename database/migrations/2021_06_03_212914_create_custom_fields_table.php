<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_fields', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->boolean('required')->nullable();
            $table->morphs('model');
            $table->timestamps();
        });

        Schema::create('custom_field_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('custom_field_id');
            $table->text('name')->nullable();
            $table->text('prefix')->nullable();
            $table->text('suffix')->nullable();
            $table->string('locale')->index();
            $table->unique(['custom_field_id', 'locale']);
            $table->foreign('custom_field_id')->references('id')->on('custom_fields')->cascadeOnDelete();
        });
        Schema::create('field_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('custom_field_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('field_option_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('field_option_id');
            $table->text('name')->nullable();
            $table->string('locale')->index();
            $table->unique(['field_option_id', 'locale']);
            $table->foreign('field_option_id')->references('id')->on('field_options')->cascadeOnDelete();
        });
        Schema::create('field_values', function (Blueprint $table) {
            $table->id();
            $table->morphs('model');
            $table->foreignId('custom_field_id')->constrained()->cascadeOnDelete();
            $table->foreignId('field_option_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('value')->nullable();
            $table->string('type');
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
        Schema::dropIfExists('field_values');
        Schema::dropIfExists('field_option_translations');
        Schema::dropIfExists('field_options');
        Schema::dropIfExists('custom_field_translations');
        Schema::dropIfExists('custom_fields');
    }
}
