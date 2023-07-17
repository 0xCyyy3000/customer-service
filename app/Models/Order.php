<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'technician',
        'est_due',
        'accessories',
        'items',
        'status',
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    function invoice(): HasOne
    {
        return $this->hasOne(Invoice::class);
    }
}
