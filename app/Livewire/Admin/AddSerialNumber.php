<?php

namespace App\Livewire\Admin;

use App\Models\SerialNumber;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Add Serial Nubmber')]
#[Layout('components.layouts.admin')]
class AddSerialNumber extends Component
{
    use LivewireAlert, WithFileUploads;

    #[Rule('required|numeric|min:1')]
    public $serial_number;

    #[Rule('required|file|mimes:jpeg,jpg,webp,png')]
    public $photo;

    #[Rule('required|unique:serial_numbers,text')]
    public $text;

    #[Rule('required|string')]
    public $vision;

    #[Rule('required|string')]
    public $mission;

    public function render()
    {
        return view('livewire.admin.add-serial-number');
    }

    protected function messages()
    {
        return [
            'serial_number.required' => 'Nomor urut wajib diisi.',
            'serial_number.numeric' => 'Nomor urut harus berupa angka.',
            'serial_number.min' => 'Nomor urut harus lebih dari 1.',
            'photo.required' => 'Foto wajib diisi.',
            'photo.file' => 'Foto harus berupa file.',
            'photo.mimes' => 'Tipe foto harus: jpeg, jpg, webp, png.',
            'text.required' => 'Nama pasangan kandidat wajib diisi.',
            'text.unique' => 'Nama pasangan kandidat telah dipakai.',
            'vision.required' => 'Visi wajib diisi.',
            'vision.string' => 'Visi harus berupa string.',
            'mission.required' => 'Misi wajib diisi.',
            'mission.string' => 'Misi harus berupa string.',
        ];
    }

    public function submit()
    {
        $params = $this->validate();
        $params['photo'] = $this->photo->storeAs('serial_numbers', $this->text.'.png');
        $this->photo->delete();

        $number = SerialNumber::query()->create($params);
        $number->Vision()->create(['text' => $params['vision']]);
        $number->Mission()->create(['text' => $params['mission']]);

        return $this->flash('success', 'Nomor urut berhasil dibuat.', [], route('admin.serial-numbers'));
    }
}
