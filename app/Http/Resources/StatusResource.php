<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StatusResource extends ResourceCollection {

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
                    'title'       => $item->getTrans('title'),
                ];
            }),
            'status' => true,
            'msg' => trans('api.success')
        ];
    }
}
