<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'live_key', 'test_key', 'webhook', 'user_id', 'token'];
    protected $table = 'keys';
}
