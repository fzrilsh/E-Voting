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

    public function mount(){
        $now = Carbon::now();
        $schedule = VoteSchedule::query()->where('start', '<=', $now)->where('end', '>=', $now)->first();

        $this->registeredUsers = User::all()->count();
        $this->voters = !$schedule ? 0 : $schedule->votings['vote_in'];
    }

    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
