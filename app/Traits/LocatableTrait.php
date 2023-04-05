<?php

namespace App\Traits;


use Illuminate\Support\Facades\DB;

trait LocatableTrait {

    /**
     * Scope a query to include the distance from the current model.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNearby($query, $latitude, $longitude, $max = 0, $maxColumn = null)
    {
        if (isset($latitude) && isset($longitude))
        {
            $query
                ->select($this->getTable().'.*', DB::raw("
                6371 * acos(
                    cos(radians($latitude)) *
                    cos(radians(lat)) *
                    cos(radians(lng) - radians($longitude)) +
                    sin(radians($latitude)) *
                    sin(radians(lat))
                ) AS distance
            "))
                ->orderByRaw('distance');
            if ($max)
                $query->having('distance', '<', $max);
            if ($maxColumn)
                $query->having('distance', '<', DB::raw($maxColumn));
        }
    }
}
