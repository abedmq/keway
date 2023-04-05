<?php


namespace App\Traits\User;


trait TypeTrait {

    function scopeProvider($q)
    {
        $q->where('type', 'provider');
    }

    function isProvider()
    {
        return $this->type == 'provider';
    }

    function scopeCustomer($q)
    {
        $q->where('type', 'customer');
    }

    function isCustomer()
    {
        return $this->type == 'customer';
    }
}