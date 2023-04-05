<?php

namespace App\Models;

use App\Helpers\Datatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model {

    use HasFactory,Datatable;

    protected $fillable
        = [
            'code',
            'name',
            'status',
            'is_default',
        ];

    function ScopeActive($q)
    {
        $q->where('status', 1);
    }
    function ScopeDefault($q,$default=1)
    {
        $q->where('is_default', $default);
    }

    static function list(){
        return self::active()->get();
    }
}
