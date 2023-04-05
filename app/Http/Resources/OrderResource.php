<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'provider' => new UserResource($this->provider),
            'status' => [
                'id' => @$this->status->getBase('id'),
                'title' => @$this->status->getTrans('title'),
            ],
            'payment' => [
                'id' => @$this->payment ? $this->payment->getBase('id') : 0,
                'title' => @$this->payment ? $this->payment->getTrans('title') : '',
                'description' => @$this->payment ? $this->payment->getTrans('description') : '',
                'code' => @$this->payment ? $this->payment->getBase('code') : '',
            ],
            'area' => $this->area ? new AreaResource($this->area) : [],
            'service' => $this->service ? new ServiceResource($this->service) : null,

            //            check
            'check_at' => $this->check_at ? $this->check_at->format('Y-m-d H:i:s') : '',
            'arrive_at' => $this->arrive_at ? $this->arrive_at->format('Y-m-d H:i:s') : '',
            'estimated_time' => $this->estimated_time ?? 0,
            'estimated_price_parts' => $this->estimated_price_parts ?? 0,
            'estimated_price' => $this->estimated_price ?? 0,
            'check_description' => $this->check_description ?? 0,

            'is_pay_complete' => $this->is_pay_complete ?? 0,
            'cancel_reason_id' => $this->cancel_reason_id,
            'cancel_reason' => $this->cancelReason ? $this->cancelReason->getTrans('title') : $this->cancel_reason,
            'cancel_at' => $this->cancel_at ? $this->cancel_at->format('Y-m-d H:i:s') : '',
            'is_cancel' => $this->cancel_at ? 1 : 0,
            'cancel_by_me' => $this->cancel_user_id == request()->user()->id ? 1 : 0,
            'duration' => intval($this->duration) ?? 0,
            'is_working' => $this->is_working ? 1 : 0,
            'start_at' => $this->start_at ? $this->start_at->format('Y-m-d H:i:s') : '',
            'complete_at' => $this->complete_at ? $this->complete_at->format('Y-m-d H:i:s') : '',
            'bring_times' => $this->bring_times ?? 0,
            'bought_price' => $this->bought_price ?? 0,
            'price' => $this->price ?? 0,
            'tax_rate' => $this->when($this->tax_rate, $this->tax_rate),
            'tax' => $this->when($this->tax_rate, $this->tax ?? 0),
            'discount' => $this->discount ?? 0,
            'total_price' => $this->total_price ?? 0,
            'total_price_floor' => floor($this->total_price ?? 0),
            'hour_price' => $this->when(request()->user()->isProvider(), $this->hour_price ?? 0),
            'provider_profit' => $this->when(request()->user()->isProvider(), $this->provider_profit ?? 0),
            'total_provider_money' => $this->when(request()->user()->isProvider(), $this->total_provider_money ?? 0),
            'lat' => $this->lat,
            'lng' => $this->lng,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'bills' => $this->bills->map(function ($item) {
                return [
                    'id' => $item->id,
                    'image' => get_images_group($item->image),
                    'type' => $item->type,
                    'size' => $item->size,
                ];
            }),
        ];
    }
}
