<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderProduct extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'product_id',
        'order_id',
        'product_name',
        'product_unit_price',
        'quantity'
    ];
    function products(): HasMany {
        return $this->hasMany(Product::class);
    }
    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }
}
