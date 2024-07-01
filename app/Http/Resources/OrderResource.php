<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "images" => array_map( fn($item) => env("FILE_ROOT") . $item, $this->images->pluck("image")->all()),
            "products" => $this->products->pluck("name")->all(),
            "created_at" => $this->created_at->diffForHumans(),
            "quantity" => $this->total_quantity,
            "status" => $this->status,
        ];
    }
}
