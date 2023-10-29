<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference'); 
            $table->decimal('amount', 10, 2); 
            $table->string('source')->default('WEB_APP');
            $table->string('status');  
            $table->string('network');  
            $table->string('type'); 
            $table->string('destination');  
            $table->string('unit')->nullable();  
            $table->text('token')->nullable();   
            $table->string('payment_method')->default('WALLET');   
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
