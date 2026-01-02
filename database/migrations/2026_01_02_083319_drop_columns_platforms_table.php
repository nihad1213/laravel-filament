<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (config('database.default') === 'sqlite') {
            DB::statement('CREATE TABLE platforms_new AS SELECT id, name, created_at, updated_at FROM platforms');  

            DB::statement('DROP TABLE platforms');  

            DB::statement('ALTER TABLE platforms_new RENAME TO platforms');
        } else {
            Schema::table('platforms', function (Blueprint $table) {
                $table->dropColumn(['slug', 'type', 'icon']);
            });
        }
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('platforms', function (Blueprint $table) {
            //
        });
    }
};
