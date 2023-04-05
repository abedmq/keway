<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\OrderStatus;

class OrderObserver {

    /**
     * Handle the Order "created" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function created(Order $order)
    {
        //
        $order->update([
            'company_profit_rate' => settings('company_profit_rate'),
            'price_pre_bring'     => settings('price_pre_bring') ?? 0,
            'hour_price'          => settings('hour_price'),
            'discount'            => 0,
            'tax_rate'            => settings('tax_rate'),
            'check_price'         => settings('check_price'),
        ]);
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
        if ($order->estimated_time && $order->estimated_price_parts && (!$order->estimated_price))
        {
            $order->update([
                'estimated_price' => $order->getEstimatePrice(),
            ]);
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
