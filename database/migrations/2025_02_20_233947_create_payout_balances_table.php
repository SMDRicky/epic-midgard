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
        Schema::create('payout_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('account_id')->unsigned();
            $table->string('transaction_id')->nullable();
            $table->decimal('value');
            $table->string('pix_key');
            $table->string('owner_name')->nullable();
            $table->string('owner_tax_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->enum('status', ['done', 'pending', 'created', 'failed']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payout_balances');
    }
};
