<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
        Schema::create('fund_requests', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2); 
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('transactionReference');
            $table->string('paymentReference');
            $table->enum('status', ['0', '1', '2'])->default('0')->comment('0=processing 1=successful 2=failed');
            $table->string('email'); 
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('fund_requests');
    }
};
