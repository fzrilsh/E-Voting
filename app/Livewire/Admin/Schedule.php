<?php

namespace App\Livewire\Admin;

use App\Models\VoteSchedule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Schedule')]
#[Layout('components.layouts.admin')]
class Schedule extends Component
{
    use LivewireAlert;

    public $schedules;

    public $deletedSchedule;

    protected $listeners = [
        'confirmed',
    ];

    public function mount()
    {
        $this->schedules = VoteSchedule::all();
    }

    public function render()
    {
        return view('livewire.admin.schedule');
    }

    public function destroy(VoteSchedule $schedule)
    {
        $this->deletedSchedule = $schedule;

        $this->confirm('Delete schedule?', [
            'onConfirmed' => 'confirmed',
        ]);
    }

    public function confirmed()
    {
        $this->deletedSchedule->delete();

        return redirect()->route('admin.schedules');
    }
}
