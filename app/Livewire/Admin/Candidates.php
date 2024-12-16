<?php

namespace App\Livewire\Admin;

use App\Models\Candidate;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Candidates')]
#[Layout('components.layouts.admin')]
class Candidates extends Component
{
    use LivewireAlert;

    public $candidates = [];

    public Candidate $deletedCandidate;

    protected $listeners = [
        'confirmed',
    ];

    public function mount()
    {
        $this->candidates = Candidate::all();
    }

    public function render()
    {
        return view('livewire.admin.candidates');
    }

    public function destroy(Candidate $candidate)
    {
        $this->deletedCandidate = $candidate;

        $this->confirm('Delete candidate?', [
            'onConfirmed' => 'confirmed',
        ]);
    }

    public function confirmed()
    {
        Storage::delete($this->deletedCandidate->photo);
        $this->deletedCandidate->delete();

        return redirect()->route('admin.candidates');
    }
}
