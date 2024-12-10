<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'profile_type',
        'profile_id',
        'role'
    ];

    public function profile(){
        return $this->morphTo();
    }
}
