<?php


namespace App\Traits;


trait SortableTrait {

    function scopeSort($q)
    {
        return $q->orderBy('sort');
    }
}