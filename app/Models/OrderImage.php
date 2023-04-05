<?php

namespace App\Models;

use App\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderImage extends Model {

    use HasFactory,ImageTrait;

    protected $table   = 'order_images';
    protected $guarded = [];

    function order()
    {
        return $this->belongsTo(Order::class);
    }


    function scopeBill($q){
        return $q->where('type','bill');
    }
}
