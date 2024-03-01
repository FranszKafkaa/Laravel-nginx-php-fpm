<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sale extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => \App\Enum\Sale::class,
    ];

    public function Products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
