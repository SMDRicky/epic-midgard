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
        Schema::create('donate_client', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->string('name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('cpf')->nullable();
            $table->string('phone', 15)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donate_client');
    }
};
