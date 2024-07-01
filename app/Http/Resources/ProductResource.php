<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $categories = [];
        $images = [];

        foreach($this->images as $image) {
            $image->image = env("FILE_ROOT"). $image->image;
            array_push($images, $image);
        }

        foreach($this->categories as $category) {
            array_push($categories, $category->id);
        }
        
        return [
            "id" => $this->id,
            "name" => $this->name,
            "price" => $this->price,
            "short_desc" => $this->short_desc,
            "long_desc" => $this->long_desc,
            "categories" => $categories,
            "images" => $images,
        ];
    }
}
