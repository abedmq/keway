<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use App\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{

    use HasFactory, LanguageTrait, ActiveTrait, Datatable;

    const WAITING = 1;
    const APPROVED = 2;
    const IN_WAY = 3;
    const ARRIVE = 4;
    const CHECK = 5;
    const WORKING = 6;
    const COMPLETE = 7;
    const CANCEL = 8;

    function isCancel()
    {
        return $this->id == self::CANCEL;
    }

    function isWorking()
    {
        return $this->id == self::WORKING;
    }

    function isComplete()
    {
        return $this->id == self::COMPLETE;
    }

    protected $table = 'order_status';
    protected $guarded = [];
    protected $appends = ['translates'];

    function orders()
    {
        return $this->hasMany(Order::class, 'status_id');
    }
}
