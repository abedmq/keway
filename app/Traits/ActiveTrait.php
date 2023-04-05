<?php


namespace App\Traits;


trait ActiveTrait {

    function scopeActive($q)
    {
        $q->where('status', 1);
    }
}