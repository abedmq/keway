<?php

namespace App\Observers;

use App\Models\ProviderMoneyTransfer;

class ProviderMoneyTransferObserver {

    /**
     * Handle the ProviderMoneyTransfer "created" event.
     *
     * @param \App\Models\ProviderMoneyTransfer $providerMonyTransfer
     * @return void
     */
    public function created(ProviderMoneyTransfer $providerMonyTransfer)
    {
        //
        if ($providerMonyTransfer->provider)
        {
            $wallet = intval($providerMonyTransfer->provider->wallet ?? 0);
            if ($providerMonyTransfer->isAdd())
            {
                $wallet += $providerMonyTransfer->amount;
            } else
            {
                $wallet -= $providerMonyTransfer->amount;
            }
            $providerMonyTransfer->provider->update(['wallet' => $wallet]);
        }
    }

    /**
     * Handle the ProviderMoneyTransfer "updated" event.
     *
     * @param \App\Models\ProviderMoneyTransfer $providerMonyTransfer
     * @return void
     */
    public function updated(ProviderMoneyTransfer $providerMonyTransfer)
    {
        //
    }

    /**
     * Handle the ProviderMoneyTransfer "deleted" event.
     *
     * @param \App\Models\ProviderMoneyTransfer $providerMonyTransfer
     * @return void
     */
    public function deleted(ProviderMoneyTransfer $providerMonyTransfer)
    {
        //
        //
        if ($providerMonyTransfer->provider)
        {
            $wallet = intval($providerMonyTransfer->provider->wallet ?? 0);
            if ($providerMonyTransfer->isAdd())
            {
                $wallet -= $providerMonyTransfer->amount;
            } else
            {
                $wallet += $providerMonyTransfer->amount;
            }
            $providerMonyTransfer->provider->update(['wallet' => $wallet]);
        }
    }

    /**
     * Handle the ProviderMoneyTransfer "restored" event.
     *
     * @param \App\Models\ProviderMoneyTransfer $providerMonyTransfer
     * @return void
     */
    public function restored(ProviderMoneyTransfer $providerMonyTransfer)
    {
        //
        if ($providerMonyTransfer->provider)
        {
            $wallet = intval($providerMonyTransfer->provider->wallet ?? 0);
            if ($providerMonyTransfer->isAdd())
            {
                $wallet += $providerMonyTransfer->amount;
            } else
            {
                $wallet -= $providerMonyTransfer->amount;
            }
            $providerMonyTransfer->provider->update(['wallet' => $wallet]);
        }
    }

    /**
     * Handle the ProviderMoneyTransfer "force deleted" event.
     *
     * @param \App\Models\ProviderMoneyTransfer $providerMonyTransfer
     * @return void
     */
    public function forceDeleted(ProviderMoneyTransfer $providerMonyTransfer)
    {
        //
    }
}
