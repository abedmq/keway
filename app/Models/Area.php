<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use App\Traits\LanguageTrait;
use App\Traits\LocatableTrait;
use App\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    use HasFactory, LanguageTrait, ActiveTrait, SortableTrait, LocatableTrait, Datatable;

    protected $guarded = [];
    protected $appends = ['translates'];

    function scopeSupportLocation($q, $lat, $lng)
    {
        $q->nearby($lat, $lng, 0, 'diameter');
    }
}
