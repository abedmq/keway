<?php

namespace App\Observers;

use App\Models\Rate;

class RateObserver {

    /**
     * Handle the Rate "created" event.
     *
     * @param \App\Models\Rate $rate
     * @return void
     */
    public function created(Rate $rate)
    {
        //
        if ($rate->provider)
        {
            $rate->provider->update(['rate' => $rate->provider->calculateRate() * 100]);
        }
    }

    /**
     * Handle the Rate "updated" event.
     *
     * @param \App\Models\Rate $rate
     * @return void
     */
    public function updated(Rate $rate)
    {
        //
    }

    /**
     * Handle the Rate "deleted" event.
     *
     * @param \App\Models\Rate $rate
     * @return void
     */
    public function deleted(Rate $rate)
    {
        //

        if ($rate->provider)
        {
            $rate->provider->update(['rate' => $rate->provider->calculateRate() * 100]);
        }
    }

    /**
     * Handle the Rate "restored" event.
     *
     * @param \App\Models\Rate $rate
     * @return void
     */
    public function restored(Rate $rate)
    {
        //

        if ($rate->provider)
        {
            $rate->provider->update(['rate' => $rate->provider->calculateRate() * 100]);
        }
    }

    /**
     * Handle the Rate "force deleted" event.
     *
     * @param \App\Models\Rate $rate
     * @return void
     */
    public function forceDeleted(Rate $rate)
    {
        //
    }
}
