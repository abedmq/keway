<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProviderCollection extends ResourceCollection {

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
                    'id'       => $item->id,
                    'name'     => $item->name,
                    'mobile'   => $item->mobile,
                    'image'    => get_images_group($item->image),
                    'distance' => intval($item->distance),
                    'rate'     => $item->getRate(),
                ];
            }),

            'status' => true,
            'msg' => trans('api.success')
        ];
    }
}
