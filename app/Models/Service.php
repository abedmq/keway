<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use App\Traits\ImageTrait;
use App\Traits\LanguageTrait;
use App\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    use HasFactory;
    use ActiveTrait, SortableTrait,Datatable,LanguageTrait,ImageTrait;

    protected $appends=['translates'];
    protected $guarded = [];
}
