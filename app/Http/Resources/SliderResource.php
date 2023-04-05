<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SliderResource extends ResourceCollection {

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($item) {
                return [
                    'id'          => $item->getBase('id'),
                    'image'       => get_images_group($item->getBase('image')),
                    'title'       => $item->getTrans('title'),
                    'description' => $item->getTrans('description'),
                    'type'        => $item->getBase('type'),
                ];
            }),

            'status' => true,
            'msg' => trans('api.success')
        ];
    }
}
