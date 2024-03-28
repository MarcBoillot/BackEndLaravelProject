<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Crafter extends Model
{
    use HasFactory;
    use HasUuids;
    protected $fillable = [
        'information',
        'story',
        'crafting_process',
        'location',
        'material_preference',
        'user_id'
    ];
 function user(): BelongsTo {
            return $this->belongsTo(User::class);
        }
}
