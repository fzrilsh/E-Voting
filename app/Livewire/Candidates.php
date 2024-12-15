<?php

namespace App\Livewire;

use App\Models\VoteSchedule;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Candidates')]
class Candidates extends Component
{
    public $candidates;

    public function mount()
    {
        $now = Carbon::now();
        $this->candidates = VoteSchedule::query()->where('start', '<=', $now)->where('end', '>=', $now)->first();
    }

    public function render()
    {
        return view('livewire.candidates');
    }
}
