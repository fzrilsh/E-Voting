<?php

namespace App\Livewire;

use App\Models\VoteSchedule;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public $candidates;

    public function mount()
    {
        $now = Carbon::now();
        $this->candidates = VoteSchedule::query()->where('start', '<=', $now)->where('end', '>=', $now)->first()?->setAppends(['candidates']);

        if (! $this->candidates) {
            // VoteSchedule::all()->map(fn ($v) => $v->delete());
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
