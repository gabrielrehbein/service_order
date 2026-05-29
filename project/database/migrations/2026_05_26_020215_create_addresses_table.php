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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')
                ->unique()
                ->constrained()
                ->onDelete('cascade');
            $table->string("country", 4)->default("BR");
            $table->string("state", 4);
            $table->string("city", 100);
            $table->string("neighborhood");
            $table->string("street", 150);
            $table->string("number", 8);
            $table->text("complement")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
