<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AreaCollection extends ResourceCollection
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
            'data' => $this->collection->map(function ($item) {
                return new AreaResource($item);
            }),
            'status' => true,
            'msg' => trans('api.success')
        ];
    }
}
