<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('wallet_id');
            $table->decimal('commission', 10, 2);
            $table->decimal('balance', 10, 2); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('wallets');
    }
};
