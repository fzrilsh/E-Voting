<?php

namespace App\Livewire;

use App\Models\SerialNumber;
use App\Models\User;
use App\Models\VoteSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Vote')]
class Vote extends Component
{
    use LivewireAlert;

    #[Rule('required|exists:serial_numbers,id')]
    public $choice;

    public $schedule;

    public $hasVote;

    public function mount()
    {
        $now = Carbon::now();
        $this->schedule = VoteSchedule::query()->where('start', '<=', $now)->where('end', '>=', $now)->first();

        if (! $this->schedule) {
            // VoteSchedule::all()->map(fn ($v) => $v->delete());
        }

        $this->hasVote = Auth::user()->Votings()->getQuery()->where('vote_schedule_id', $this->schedule?->id)->first();
        if ($this->hasVote) {
            $this->choice = $this->hasVote->serial_number_id;
        }
    }

    public function render()
    {
        return view('livewire.vote');
    }

    public function vote()
    {
        $this->validate();

        $user = User::query()->find(Auth::user()->id);
        $serial = SerialNumber::query()->find($this->choice);

        if ($user->Votings()->getQuery()->where('vote_schedule_id', $this->schedule->id)->first()) {
            return $this->flash('warning', 'Gagal, kamu sudah pernah voting!', [], route('quick-count'));
        }

        $user->Votings()->create([
            'vote_schedule_id' => $this->schedule->id,
            'serial_number_id' => $this->choice,
            'user_id' => $user->id,
        ]);

        return $this->alert('success', 'Berhasil, kamu berhasil melakukan voting untuk pasangan nomor urut '.$serial->serial_number);
    }
}
