<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class VoteSchedule extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'candidates_ids',
        'start',
        'end',
    ];

    protected $appends = ['participants', 'votings'];

    protected function casts()
    {
        return [
            'candidates_ids' => 'array',
        ];
    }

    public function Votings(): HasMany
    {
        return $this->hasMany(Voting::class);
    }

    public function getParticipantsAttribute()
    {
        return collect($this->candidates_ids)->map(function ($id) {
            $s = SerialNumber::query()->find($id);

            return [
                'candidates' => $s->Candidates()->get(),
                'serial_number' => $s,
                'vision' => $s->Vision()?->first()?->text,
                'mission' => $s->Mission()?->first()?->text,
            ];
        });
    }

    public function getVotingsAttribute()
    {
        $votings = $this->Votings()->get();
        $groupedVotings = $votings->groupBy('serial_number')->map(fn ($v) => [
            'count' => count($v),
            'percent' => number_format(count($v) / ($votings->count() ?: 1) * 100, 1),
        ]);

        return [
            ...$groupedVotings,
            'vote_in' => $votings->count(),
            'vote_in_percent' => number_format($votings->count() / (User::all()->count() ?: 1) * 100, 1),
        ];
    }
}
