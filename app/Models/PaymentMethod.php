<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use App\Traits\LanguageTrait;
use App\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{

    const CODES
        = [
            'cash',
            'cards',
            'paypal',
        ];
    protected $appends = ['translates'];

    const CACHE = 1;
    const CARDS = 2;

    protected $fillable = ['title', 'description', 'code', 'status', 'sort', 'admin_id', 'language_id', 'parent_id'];
    use HasFactory;
    use LanguageTrait, ActiveTrait, SortableTrait, Datatable;
}
