<?php

namespace App\Models;

use App\Helpers\Datatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderMoneyTransfer extends Model
{

    use HasFactory, SoftDeletes,Datatable;

    protected $guarded = [];

    protected $appends=['type_text'];
    function getTypeTextAttribute()
    {
        switch ($this->type) {
            case 'creditor':
                return "أرباح";
            case 'debit':
                return "مستحقات";
            case 'withdraw':
                return "سحب";
        }
    }

    function scopeSearch($q)
    {
        $query = request('query')['query'] ?? '';
        if ($query) {
            $q->where('id', $query);
            $q->where('name', "like", "%$query%");
        }
    }


    function provider()
    {
        return $this->belongsTo(User::class);
    }


    function order()
    {
        return $this->belongsTo(Order::class);
    }

    function isAdd()
    {
        return $this->type == 'creditor';
    }

    function isSub()
    {
        return $this->type == 'debit' || $this->type == 'withdraw';
    }
}
