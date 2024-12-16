<?php

namespace App\Livewire\Admin;

use App\Models\SerialNumber;
use App\Models\VoteSchedule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Schedule')]
#[Layout('components.layouts.admin')]
class EditSchedule extends Component
{
    use LivewireAlert;

    #[Rule('required|string')]
    public $title;

    #[Rule('required|string')]
    public $description;

    #[Rule('required|array|min:2')]
    public $candidates_ids = [];

    #[Rule('required|date')]
    public $start;

    #[Rule('required|date|after:start')]
    public $end;

    public VoteSchedule $schedule;

    public function mount(VoteSchedule $schedule)
    {
        $this->schedule = $schedule;

        $this->title = $schedule->title;
        $this->description = $schedule->description;
        $this->candidates_ids = $schedule->candidates_ids;
        $this->start = $schedule->start->format('Y-m-d');
        $this->end = $schedule->end->format('Y-m-d');
    }

    protected function messages()
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa string.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.string' => 'Deskripsi harus berupa string.',
            'candidates_ids.required' => 'Daftar kandidat harus diisi.',
            'candidates_ids.min' => 'Minimal 2 kandidat yang didaftarkan.',
            'start.required' => 'Tanggal mulai wajib diisi.',
            'end.required' => 'Tanggal selesai wajib diisi.',
            'end.after' => 'Tanggal selesai harus lebih dari tanggal selesai.',
        ];
    }

    public function with()
    {
        return [
            'candidates' => SerialNumber::all(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.edit-schedule', $this->with());
    }

    public function submit()
    {
        $params = $this->validate();

        $overlapped = false;
        if ($this->schedule->start !== $this->start || $this->schedule->end !== $this->end) {
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
            })->first();
        }

        if ($overlapped && $this->schedule->id !== $overlapped->id) {
            return $this->addError('error', 'Jadwal bentrok dengan jadwal lain yang sudah ada');
        }

        $this->schedule->update($params);

        return $this->alert('success', 'Jadwal berhasil di simpan.');
    }
}
