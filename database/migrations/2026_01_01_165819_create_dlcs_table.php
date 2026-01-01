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
        Schema::create('dlcs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_game_id')->constrained('games')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->enum('type', ['expansion', 'dlc', 'season_pass', 'cosmetic']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dlcs');
    }
};
