<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NotificationResource extends ResourceCollection
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
                return [
                    'id' => $item->id,
                    'read_at' => $item->read_at?$item->read_at->format('Y-m-d H:i:s'):null,
                    'created_at' => $item->created_at->format('Y-m-d H:i:s'),
                    'updated_at' => $item->updated_at->format('Y-m-d H:i:s'),
                    'data' => $item->data,
                ];
            }),

            'status' => true,
            'msg' => trans('api.success')
        ];
    }
}
