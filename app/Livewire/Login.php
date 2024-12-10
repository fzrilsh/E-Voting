<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
class Login extends Component
{
    use LivewireAlert;

    #[Rule('required|string')]
    public $username;

    #[Rule('required|string|min:8')]
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function submit()
    {
        $params = $this->validate();

        if (! auth('web')->attempt($params)) {
            return $this->addError('error', 'Invalid username or password.');
        }

        return $this->flash('success', 'Login berhasil, selamat datang kembali '.auth('web')->user()->name, [], '/');
    }
}
