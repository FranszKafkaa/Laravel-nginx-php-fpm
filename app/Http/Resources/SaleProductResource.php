<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): \Illuminate\Support\Collection
    {
        return $this->map(function ($element) {
            return [
                'product_id' => $element->id,
                'name' => $element->name,
                'price' => $element->price,
                'amount' => $element->pivot->amount,
            ];
        });
    }
}
