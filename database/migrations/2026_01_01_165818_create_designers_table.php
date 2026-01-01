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
        Schema::create('designers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->date('founded_date')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->boolean('is_indie')->default(false);
            $table->enum('employee_count', ['1-10', '11-50', '51-200', '201-500', '500+'])->nullable();
            $table->enum('status', ['active', 'defunct', 'acquired'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designers');
    }
};
