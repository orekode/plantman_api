<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
      

        return [
            'id' => $this->id,
            'title' => $this->title,
            'image' =>  env('FILE_ROOT') . $this->image,
            'content' => $this->content,
            'buy_link' => $this->buy_link,
            'suppliment_name' => $this->suppliment_name
        ];
    }
}
