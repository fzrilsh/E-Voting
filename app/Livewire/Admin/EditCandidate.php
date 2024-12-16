<?php

namespace App\Livewire\Admin;

use App\Models\Candidate;
use App\Models\SerialNumber;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Candidate')]
#[Layout('components.layouts.admin')]
class EditCandidate extends Component
{
    use LivewireAlert, WithFileUploads;

    #[Rule('required|string')]
    public $name;

    #[Rule('nullable|file|mimes:jpeg,jpg,png,web')]
    public $photo;

    #[Rule('nullable|exists:serial_numbers,id')]
    public $serial_number_id;

    public Candidate $candidate;

    protected function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa string.',
            'photo.required' => 'Foto wajib diisi.',
            'photo.file' => 'Foto harus berupa file.',
            'photo.mimes' => 'Tipe foto harus: jpeg, jpg, webp, png.',
        ];
    }

    public function with()
    {
        return [
            'serial_numbers' => SerialNumber::all(),
        ];
    }

    public function mount(Candidate $candidate)
    {
        $this->candidate = $candidate;

        $this->name = $candidate->name;
        $this->serial_number_id = $candidate->serial_number_id;
    }

    public function render()
    {
        return view('livewire.admin.edit-candidate', $this->with());
    }

    public function submit()
    {
        $params = $this->validate();

        if (isset($params['photo'])) {
            $params['photo'] = $this->photo->storeAs('candidates', $this->name.'.png');

            Storage::delete($this->candidate->photo);
            $this->photo->delete();
        } else {
            $params['photo'] = $this->candidate->photo;
        }

        $this->candidate->update($params);

        return $this->alert('success', 'Kandidat berhasil diedit.');
    }
}
