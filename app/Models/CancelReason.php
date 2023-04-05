<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use App\Traits\LanguageTrait;
use App\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelReason extends Model
{

    protected $fillable = ['title', 'description', 'code', 'status', 'sort', 'admin_id', 'language_id', 'parent_id'];
    use HasFactory;
    use LanguageTrait, ActiveTrait, SortableTrait, Datatable;

    protected $appends = ['translates'];

    function orders()
    {
        return $this->hasMany(Order::class);
    }

    function deleteItem()
    {
        if ($this->orders()->count()) {
            return false;
        }
        $this->delete();
        return true;
    }
}
