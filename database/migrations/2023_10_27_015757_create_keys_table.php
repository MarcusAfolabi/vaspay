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
            $table->string('api_key');
            $table->string('email');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('keys');
    }
};
