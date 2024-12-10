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

    public $candidates;

    public function mount()
    {
        $now = Carbon::now();
        $this->candidates = VoteSchedule::query()->where('start', '<=', $now)->where('end', '>=', $now)->first()?->setAppends(['candidates']);

        if (! $this->candidates) {
            VoteSchedule::all()->map(fn ($v) => $v->delete());
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

        if ($user->Votings()->getQuery()->where('vote_schedule_id', $this->candidates->id)->first()) {
            return $this->flash('danger', 'Gagal, kamu sudah pernah voting!', [], '/');
        }

        $user->Votings()->create([
            'vote_schedule_id' => $this->candidates->id,
            'serial_number_id' => $this->choice,
            'user_id' => $user->id,
        ]);

        return $this->alert('success', 'Berhasil, kamu berhasil melakukan voting untuk pasangan nomor urut '.$serial->serial_number);
    }
}
