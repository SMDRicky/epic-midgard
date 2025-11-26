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
        Schema::create('item_deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pack_id')
                ->nullable()
                ->constrained('packs');
            $table->foreignId('store_id')
                ->nullable()
                ->constrained('stores');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('item_quantity');
            $table->dateTime('collected_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_deliveries');
    }
};
