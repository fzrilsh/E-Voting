<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'profile_type',
        'profile_id',
        'role',
    ];

    public function profile()
    {
        return $this->morphTo();
    }
}
