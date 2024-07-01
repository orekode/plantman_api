<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $categories = [];

        foreach ($this->categories as $category) {
            array_push($categories, $category->id);
        }

        return [
            'id' => $this->id,
            'image' => env('FILE_ROOT') . $this->image,
            'title' => $this->title,
            'desc' => $this->desc,
            'content' => $this->content,
            'categories' => $categories,
];
    }
}
