<?php

namespace App\Livewire\Admin;

use App\Models\SerialNumber;
use App\Models\VoteSchedule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Add Schedule')]
#[Layout('components.layouts.admin')]
class AddSchedule extends Component
{
    public $candidates;

    #[Rule('required|string')]
    public $title;

    #[Rule('required|string')]
    public $description;

    #[Rule('required')]
    public $candidates_ids;

    #[Rule('required|datetime')]
    public $start;

    #[Rule('required|datetime|after:start')]
    public $end;

    public function mount()
    {
        $this->candidates = SerialNumber::all();
    }

    public function render()
    {
        return view('livewire.admin.add-schedule');
    }

    public function submit()
    {
        $params = $this->validate();

        $overlapped = VoteSchedule::query()->where(function ($query) use ($params) {
            $query->where(function ($query) use ($params) {
                $query->where('start', '<=', $params['start'])
                      ->where('end', '>=', $params['start']);
            })->orWhere(function ($query) use ($params) {
                $query->where('start', '<=', $params['end'])
                      ->where('end', '>=', $params['end']);
            })->orWhere(function ($query) use ($params) {
                $query->where('start', '>=', $params['start'])
                      ->where('end', '<=', $params['end']);
            });
        })->exists();

        if($overlapped){
            return $this->addError('error', 'Jadwal bentrok dengan jadwal lain yang sudah ada');
        }

        VoteSchedule::query()->create($params);
        return redirect()->route('admin.schedules');
    }
}
