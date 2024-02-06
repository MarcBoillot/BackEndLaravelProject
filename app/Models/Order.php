<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'order_status',
        'order_price',
        'user_id',
        'order_date',
        'delivery_address',
        'facturation_address',
    ];
     function user(): BelongsTo {
         return $this->belongsTo(User::class, 'user_id');
     }
    function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'order_product')
            ->withPivot(['product_name', 'unit_price', 'quantity']);
    }
}
