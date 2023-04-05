<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mobile' => $this->mobile,
            'images' => $this->image ? get_images_group($this->image) : User::defaultImage(),
            'name' => $this->name ?: '',
            'type' => $this->type,
            'lat' => $this->when($this->isProvider(), $this->lat),
            'lng' => $this->when($this->isProvider(), $this->lng),
            'rate' => $this->when($this->isProvider(), ($this->rate / 100) ?? 0),
            'is_available' => $this->when($this->isProvider(), $this->is_available ?? 0),
        ];
    }
}
