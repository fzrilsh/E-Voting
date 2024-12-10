<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vision extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'serial_number_id',
        'text',
    ];

    public function SerialNumber(): BelongsTo
    {
        return $this->belongsTo(SerialNumber::class);
    }
}
