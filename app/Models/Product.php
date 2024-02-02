<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Product extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'unit_price',
        'name',
        'description',
        'status',
        'color',
        'customizable',
        'is_active',

    ];
    function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }
    function materials(): BelongsToMany {
        return $this->belongsToMany(Material::class);
    }
    function orderProduct(): BelongsTo {
        return $this->belongsTo(OrderProduct::class);
    }
}
