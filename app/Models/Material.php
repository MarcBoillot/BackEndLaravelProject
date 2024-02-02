<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'order_status',
        'order_price',
        'order_date',
        'delivery_address',
        'facturation_address',
        'user_id'
    ];
    function products(): BelongsToMany {
                    return $this->belongsToMany(Product::class);
                }
}
