<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Voting extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'vote_schedule_id',
        'serial_number_id',
        'user_id',
    ];

    protected $appends = ['serial_number'];

    public function SerialNumber(): BelongsTo
    {
        return $this->belongsTo(SerialNumber::class);
    }

    public function getSerialNumberAttribute()
    {
        return $this->SerialNumber()->first()->text;
    }
}
