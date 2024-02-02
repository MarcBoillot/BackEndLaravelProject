<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Address extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'address_name',
        'address_type',
        'address_firstname',
        'address_lastname',
        'first_address',
        'second_address',
        'postal_code',
        'user_id'
    ];
    function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

}
