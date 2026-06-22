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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string("plate", 9);
            $table->string("model", 200);
            $table->string("type", 100);
            $table->integer("km");
            $table->integer("year_released");
            $table->foreignId("brand_id")->constrained()->onDelete("restrict");
            $table->foreignId("customer_id")->constrained()->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
