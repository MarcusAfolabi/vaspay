<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('keys', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('live_key')->nullable();
            $table->string('test_key')->nullable();
            $table->string('email')->nullable();
            $table->text('token')->nullable();
            $table->text('webhook')->nullable();
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('keys');
    }
};
