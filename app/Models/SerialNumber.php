<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SerialNumber extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'serial_number',
        'text',
    ];

    public function Candidates(): HasMany
    {
        return $this->hasMany(Candidate::class);
    }

    public function Vision(): HasOne
    {
        return $this->hasOne(Vision::class);
    }

    public function Mission(): HasOne
    {
        return $this->hasOne(Mission::class);
    }
}
