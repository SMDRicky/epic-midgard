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
        Schema::create('payment_partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('donate_history_id');
            $table->decimal('value');
            $table->timestamps();

            $table->foreign('donate_history_id')
                ->references('id')
                ->on('donate_history')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_partners');
    }
};
