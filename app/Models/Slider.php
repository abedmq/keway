<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use App\Traits\ImageTrait;
use App\Traits\LanguageTrait;
use App\Traits\SortableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    use ActiveTrait, SortableTrait, LanguageTrait, Datatable, ImageTrait;

    protected $guarded = [];
    protected $appends = ['translates'];
}
