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
        Schema::create('donate_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id')->unsigned();
            $table->string('reference')->nullable();
            $table->string('status')->nullable();
            $table->string('value');
            $table->enum('payment_method', ['credit_card', 'pix'])->nullable();
            $table->string('token')->nullable();

            $table->foreign('client_id')
                ->references('id')->on('donate_client');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donate_history');
    }
};
