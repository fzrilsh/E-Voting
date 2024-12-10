<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoteSchedule extends Model
{
    use SoftDeletes;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'candidates_ids',
        'start',
        'end',
    ];

    protected function casts()
    {
        return [
            'candidates_ids' => 'array',
        ];
    }

    public function getCandidatesAttribute()
    {
        return collect($this->candidates_ids)->map(function ($id) {
            $s = SerialNumber::query()->find($id);

            return [
                'candidates' => $s->Candidates()->get(),
                'serial_number' => $s->serial_number,
                'vision' => $s->Vision()?->first()?->text,
                'mission' => $s->Mission()?->first()?->text,
            ];
        });
    }
}
