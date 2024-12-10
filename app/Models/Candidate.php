<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidate extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'photo',
        'serial_number_id',
        'partner_id',
    ];

    public function SerialNumber(): BelongsTo
    {
        return $this->belongsTo(SerialNumber::class);
    }

    public function Partner(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
}
