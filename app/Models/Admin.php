<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable {

    use Notifiable;

    protected $guarded = [];

    function getImage($size = '')
    {
        return $this->image ? ($this->image . ($size ? "/$size" : "")) : ("media/users/blank.png");
    }
}