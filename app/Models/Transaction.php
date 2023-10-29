<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';
    protected $fillable = ['reference', 'amount', 'token', 'beneficiary', 'source', 'status', 'type', 'network', 'destination', 'payment_method', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return$this->hasMany(Product::class);
    }
}
