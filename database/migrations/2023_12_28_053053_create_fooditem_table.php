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
        Schema::create('fooditem', function (Blueprint $table) {
            $table->id('fooditem_id');
            $table->string('fooditem_name');
            $table->string('fooditem_price');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fooditem');
    }
};
