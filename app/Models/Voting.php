<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'vote_schedule_id',
        'serial_number_id',
        'user_id',
    ];
}
