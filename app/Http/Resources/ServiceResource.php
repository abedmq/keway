<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->getBase('id'),
            'image' => get_images_group($this->getBase('image')),
            'title' => $this->getTrans('title'),
            'description' => $this->getTrans('description'),
        ];
    }
}
