<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollection extends ResourceCollection {

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return ['data' => $this->collection->map(function ($item) {
            return new OrderResource($item);
        }),
            'status' => true,
            'msg' => trans('api.success')
        ];

    }
}
