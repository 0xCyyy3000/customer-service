<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'description',
        'serial_no',
        'issue',
        'has_warranty',
        'technician',
        'status',
        'image',
        'accessories',
        'user_id'
    ];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: function (int $val) {
                switch ($val) {
                    case -1:
                        return 'Failed';
                    case 0:
                        return 'In progress';
                    case 1:
                        return 'Repaired';
                    default:
                        return 'Returned';
                }
            }
        );
    }

    protected function hasWarranty(): Attribute
    {
        return Attribute::make(
            get: function (bool $val) {
                return $val ? 'Yes' : 'No';
            }
        );
    }

    protected function accessories(): Attribute
    {
        return Attribute::make(
            get: fn (string $val = null) => $val ? ucfirst($val) : 'N/A'
        );
    }

    protected function technician(): Attribute
    {
        return Attribute::make(
            get: function (int $val = null) {
                $technician = User::find($val);
                return $technician ? "#$technician->id-$technician->full_name" : 'N/A';
            }
        );
    }

    function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
