<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model {

    use HasFactory;
    protected $guarded=[];

    function order()
    {
        return $this->belongsTo(Order::class);
    }

    function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }
}
