<?php

namespace App\Livewire\Admin;

use App\Models\SerialNumber as ModelCore;
use App\Models\SerialNumber as ModelsSerialNumber;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Serial Number')]
#[Layout('components.layouts.admin')]
class SerialNumber extends Component
{
    use LivewireAlert;

    public $deletedSerial;

    protected $listeners = ['confirmed'];

    public function with()
    {
        return [
            'serial_numbers' => ModelCore::all(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.serial-number', $this->with());
    }

    public function destroy(ModelsSerialNumber $number)
    {
        $this->deletedSerial = $number;

        $this->confirm('Delete serial number?', [
            'onConfirmed' => 'confirmed',
        ]);
    }

    public function confirmed()
    {
        Storage::delete($this->deletedSerial->photo);
        $this->deletedSerial->delete();

        return redirect()->route('admin.serial-numbers');
    }
}
