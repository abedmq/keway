<?php

namespace App\Models;

use App\Helpers\Datatable;
use App\Traits\ActiveTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    use HasFactory, ActiveTrait, Datatable;

    protected $fillable = ['message', 'user_id', 'email', 'status','admin_id'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function scopeSearch($q, $query='')
    {
        $query = request('query')['query'] ?? $query;
        if ($query) {
            $q->where('id', $query);
            $q->where('id', $query);
            $q->where('email','like', "%$query%");
        }
    }
}
