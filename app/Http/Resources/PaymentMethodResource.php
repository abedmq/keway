<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentMethodResource extends ResourceCollection {

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
                    'description' => $item->getTrans('description'),
                    'code'        => $item->getBase('code'),
                ];
            }),
            'status' => true,
            'msg' => trans('api.success')
        ];
    }
}
