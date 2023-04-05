<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model {

    use HasFactory;

    const AVAILABLE
        = [
            'notification',
        ];

    protected $guarded = [];
    protected $hidden  = 'type';
}
