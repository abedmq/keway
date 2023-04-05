<?php


namespace App\Traits\User;


use App\Models\Provider;
use App\Models\ProviderMoneyTransfer;
use App\Models\Rate;

trait ProviderTrait
{

    function scopeCanWork($q, $service_id = 0)
    {
//        $q->available();
        $q->where('is_complete', 1);
        $q->whereDoesntHave('orders', function ($q) {
            $q->active();
        });
        if ($service_id) {
            $q->whereHas('services', function ($q) use ($service_id) {
                $q->where('id', $service_id);
            });
        }
    }

    function isAvailable()
    {
        return $this->is_available == 1;
    }

    function scopeAvailable($q)
    {
        $q->where('is_available', 1);
    }

    function scopeComplete($q, $isComplete = 1)
    {
        $q->where('is_complete', $isComplete);
    }

    function scopeIsComplete($q)
    {
        $q->whereNotNull('lat')->whereNotNull('lng')->whereNotNull('identity_image')->whereNotNull('image')->whereHas('services');
    }

    function getIsCompleteDataAttribute()
    {
        return $this->lat && $this->lng && $this->identity_image && $this->image ;
    }

    function moneyTransfer()
    {
        return $this->hasMany(ProviderMoneyTransfer::class, 'provider_id');
    }

    function rates()
    {
        return $this->hasMany(Rate::class, 'provider_id');
    }

    function calculateRate()
    {
        if ($this->rates->count())
            return $this->rates->sum('rate') / $this->rates->count();
        return 1;
    }

    function getRate()
    {
        return number_format($this->rate / 100, 2);
    }
}
