<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('brand');
            $table->text('description');
            $table->string('price');
            $table->string('kilometer');
            $table->string('license_plate');
            $table->integer('build_year');
            $table->string('body');
            $table->string('fuel');
            $table->string('transmission');
            $table->string('color');
            $table->string('power');
            $table->boolean('btw');
            $table->integer('doors');
            $table->integer('seating');
            $table->timestamp('apk_expire_date');
            $table->string('fuel_usage');
            $table->string('cylinder_capacity');
            $table->integer('weight');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
