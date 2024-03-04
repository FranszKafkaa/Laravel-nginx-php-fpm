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

    protected $attributes = [
        'status' => \App\Enum\Sale::APROVED,
    ];

    public function attachProducts(array $data)
    {
        foreach ($data as $item) {
            if ($this->Products()->where('product_id', $item['id'])->exists()) {
                $this->Products()->updateExistingPivot($item['id'], ['amount' => $item['amount']]);
            } else {
                $this->Products()->attach($item['id'], ['amount' => $item['amount']]);
            }
        }
    }

    public function Products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('amount');
    }
}
