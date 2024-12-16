<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\VoteSchedule;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
#[Layout('components.layouts.admin')]
class Dashboard extends Component
{
    public int $registeredUsers;

    public int $voters;

    public $schedules;

    public $selectedSchedule;

    public $voteLabels = [];

    public $voteData = [];

    public function mount()
    {
        $now = Carbon::now();
        $schedule = VoteSchedule::query()->where('start', '<=', $now)->where('end', '>=', $now)->first();

        $this->voters = ! $schedule ? 0 : $schedule->votings['vote_in'];
        $this->schedules = VoteSchedule::withTrashed()->get()->sortBy([[ 'start', 'asc' ]]);
        $this->registeredUsers = User::query()->whereHas('profile', fn($query) => $query->where('role', 'user'))->count();
    }

    public function updatedSelectedSchedule($scheduleId)
    {
        $schedule = VoteSchedule::query()->find($scheduleId);
        if ($schedule) {
            $this->voteLabels = $schedule->participants->pluck('serial_number.text')->toArray();
            $this->voteData = collect($this->voteLabels)->map(function ($v) use ($schedule) {
                $votes = isset($schedule->votings[$v]) ? (int) $schedule->votings[$v]['count'] : 0;

                return $votes;
            })->toArray();
        } else {
            $this->voteLabels = [''];
            $this->voteData = [0];
        }

        $this->dispatch('updateChart', $this->voteLabels, $this->voteData);
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
