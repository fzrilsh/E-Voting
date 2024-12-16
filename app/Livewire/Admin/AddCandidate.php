<?php

namespace App\Livewire\Admin;

use App\Models\Candidate;
use App\Models\SerialNumber;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Add Candidate')]
#[Layout('components.layouts.admin')]
class AddCandidate extends Component
{
    use LivewireAlert, WithFileUploads;

    #[Rule('required|string')]
    public $name;

    #[Rule('required|file|mimes:jpeg,jpg,png,web')]
    public $photo;

    #[Rule('nullable|exists:serial_numbers,id')]
    public $serial_number_id;

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

    public function render()
    {
        return view('livewire.admin.add-candidate', $this->with());
    }

    public function submit()
    {
        $params = $this->validate();
        $params['photo'] = $this->photo->storeAs('candidates', $this->name.'.png');
        $this->photo->delete();

        $candidate = Candidate::query()->create($params);

        return $this->flash('success', 'Kandidat berhasil di daftarkan.', [], route('admin.candidates.edit', $candidate));
    }
}
