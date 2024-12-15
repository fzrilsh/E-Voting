<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = true;

    protected $fillable = [
        'nim',
        'name',
        'nickname',
        'password',
        'gender',
        'birth_date',
    ];

    public function profile(): MorphOne
    {
        return $this->morphOne(Profile::class, 'profile');
    }

    public function Votings(): HasMany
    {
        return $this->hasMany(Voting::class);
    }
}
