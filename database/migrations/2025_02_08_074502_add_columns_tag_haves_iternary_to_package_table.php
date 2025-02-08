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
        Schema::table('packages', function (Blueprint $table) {
            //            
            $table->string('summary')->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->string('tag')->nullable();
            $table->json('iternary_details')->nullable(); // Add this line
            $table->text('haves_and_not_haves')->nullable(); // Add this line
            $table->json('trip_highlights')->nullable(); // Add this line
            $table->json('dest_days')->nullable(); // Add this line
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            //
            $table->dropColumn('tag');
            $table->dropColumn('iternary_details'); // Add this line
            $table->dropColumn('haves_and_not_haves'); // Add this line
            $table->dropColumn('trip_highlights'); // Add this line
            $table->dropColumn('dest_days'); // Add this line
        });
    }
};
