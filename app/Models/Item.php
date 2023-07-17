<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'serial_no',
        'issue',
        'has_warranty',
        'technician',
        'status',
        'image'
    ];

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
