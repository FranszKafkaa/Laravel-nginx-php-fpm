<?php

namespace App\Http\Resources\Sale;

use App\Http\Resources\SaleProductResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'sale_id' => $this->id,
            'amount' => $this->amount,
            'status' => $this->status->name,
            'products' => (new SaleProductResource($this->Products()->withPivot('amount')->get())),
        ];
    }
}
