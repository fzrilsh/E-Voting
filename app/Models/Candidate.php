<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidate extends Model
{
    public $timestamps = true;

    protected $fillable = [
        'name',
        'photo',
        'serial_number_id',
    ];

    protected $appends = ['serial_number'];

    public function SerialNumber(): BelongsTo
    {
        return $this->belongsTo(SerialNumber::class);
    }

    public function getSerialNumberAttribute()
    {
        return $this->SerialNumber()->first();
    }
}
