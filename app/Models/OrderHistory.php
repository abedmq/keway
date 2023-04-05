<?php

namespace App\Models;

use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory,LanguageTrait;
    protected $table='order_histories';
    protected $guarded=[];
    function order(){
        return $this->belongsTo(Order::class);
    }
}
