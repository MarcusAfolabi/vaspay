<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount', 'transactionReference', 'paymentReference', 'email', 'status', 'user_id'
    ];
    protected $table = 'fund_requests';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
