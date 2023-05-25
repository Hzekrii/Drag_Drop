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
        Schema::table('sections', function (Blueprint $table) {
            $table->unsignedInteger('position')->after('id');
        });
        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedInteger('position')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lessons,sections', function (Blueprint $table) {
            $table->dropColumn('position');
        });
    }
};
