<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{

    private $token;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function __construct($resource, $token = null)
    {
        $this->token = $token;
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mobile' => $this->mobile,
            'new_mobile' => $this->when($this->new_mobile, $this->new_mobile),
            'settings' => (sizeof($this->settings) ? $this->settings : $this->defaultSettings())->pluck('value', 'key'),
            'images' => $this->image ? get_images_group($this->image) : User::defaultImage(),
            'image' => $this->image ,
            'name' => $this->name ?: '',
            'language' => $this->language->only('id', 'code', 'name'),
            'type' => $this->type,
            'status' => $this->status,
            'is_complete' => $this->when($this->isProvider(), $this->is_complete ?? 0),
            'services' => $this->when($this->isProvider(), new ServiceCollection($this->services)),
            'lat' => $this->when($this->isProvider(), $this->lat),
            'lng' => $this->when($this->isProvider(), $this->lng),
            'rate' => $this->when($this->isProvider(), ($this->rate / 100) ?? 0),
            'wallet' => $this->when($this->isProvider(), $this->wallet ?? 0),
            'is_available' => $this->when($this->isProvider(), $this->is_available ?? 0),
            'is_complete_data' => $this->when($this->isProvider(), $this->is_complete_data ?? 0),
            'identity_image' => $this->when($this->isProvider(), $this->identity_image ??''),
            'token' => $this->when($this->token, @$this->token->plainTextToken),
        ];
    }
}
