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
        Schema::table('login', function (Blueprint $table) {
            $table->tinyInteger('has_partner')->after('cash')->default(0);
            $table->string('tag', 191)->after('has_partner')->unique()->nullable();
            $table->decimal('payout_balance')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('login', function (Blueprint $table) {
            $table->dropColumn('has_partner');
            $table->dropColumn('tag');
            $table->dropColumn('payout_balance');
        });
    }
};
