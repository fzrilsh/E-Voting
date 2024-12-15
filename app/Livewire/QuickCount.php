<?php

namespace App\Livewire;

use App\Models\VoteSchedule;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Quick Count')]
class QuickCount extends Component
{
    public $schedule;

    public function mount()
    {
        $now = Carbon::now();
        $this->schedule = VoteSchedule::query()->where('start', '<=', $now)->where('end', '>=', $now)->first();
    }

    public function render()
    {
        return view('livewire.quick-count');
    }
}
