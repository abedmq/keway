<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AreaResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'       => $this->getBase('id'),
            'title'    => $this->getTrans('title'),
            'lat'      => $this->getBase('lat'),
            'lng'      => $this->getBase('lng'),
            'diameter' => $this->getBase('diameter'),
        ];
    }
}
