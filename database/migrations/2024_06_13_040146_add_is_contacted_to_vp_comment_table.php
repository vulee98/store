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
    Schema::table('vp_comment', function (Blueprint $table) {
        $table->boolean('is_contacted')->default(false);
    });
}

public function down(): void
{
    Schema::table('vp_comment', function (Blueprint $table) {
        $table->dropColumn('is_contacted');
    });
}
};