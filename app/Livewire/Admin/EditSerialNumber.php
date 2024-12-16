<?php

namespace App\Livewire\Admin;

use App\Models\SerialNumber;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Edit Serial Nubmber')]
#[Layout('components.layouts.admin')]
class EditSerialNumber extends Component
{
    use LivewireAlert, WithFileUploads;

    public $serial_number;

    public $photo;

    public $text;

    public $vision;

    public $mission;

    public SerialNumber $number;

    public function mount(SerialNumber $number)
    {
        $this->number = $number;

        $this->serial_number = $number->serial_number;
        $this->text = $number->text;
        $this->vision = $number->Vision()->first()?->text;
        $this->mission = $number->Mission()->first()?->text;
    }

    protected function rules()
    {
        $number = $this->number;

        return [
            'serial_number' => 'required|numeric|min:1',
            'photo' => 'nullable|file|mimes:jpeg,jpg,webp,png',
            'text' => ['required', function ($attr, $value, $fail) use ($number) {
                if ($value !== $number->text) {
                    if (SerialNumber::query()->where('text', $value)->first()) {
                        $fail('Nama pasangan kandidat telah dipakai.');
                    }
                }
            }],
            'vision' => 'required|string',
            'mission' => 'required|string',
        ];
    }

    protected function messages()
    {
        return [
            'serial_number.required' => 'Nomor urut wajib diisi.',
            'serial_number.numeric' => 'Nomor urut harus berupa angka.',
            'serial_number.min' => 'Nomor urut harus lebih dari 1.',
            'photo.mimes' => 'Tipe foto harus: jpeg, jpg, webp, png.',
            'text.required' => 'Nama pasangan kandidat wajib diisi.',
            'text.unique' => 'Nama pasangan kandidat telah dipakai.',
            'vision.required' => 'Visi wajib diisi.',
            'vision.string' => 'Visi harus berupa string.',
            'mission.required' => 'Misi wajib diisi.',
            'mission.string' => 'Misi harus berupa string.',
        ];
    }

    public function render()
    {
        return view('livewire.admin.edit-serial-number');
    }

    public function submit()
    {
        $params = $this->validate();

        if (isset($params['photo'])) {
            $params['photo'] = $this->photo->storeAs('serial_numbers', $this->text.'.png');
            if ($this->number->photo) {
                Storage::delete($this->number->photo);
            }

            $this->photo->delete();
        } else {
            $params['photo'] = $this->number->photo;
        }

        $this->number->update($params);
        if (isset($params['vision'])) {
            $this->number->Vision()->first()->update(['text' => $params['vision']]);
        }
        if (isset($params['mission'])) {
            $this->number->Mission()->first()->update(['text' => $params['mission']]);
        }

        return $this->flash('success', 'Nomor urut berhasil di edit.', [], back()->getTargetUrl());
    }
}
