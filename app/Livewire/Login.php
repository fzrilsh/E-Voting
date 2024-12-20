<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
#[Layout('components.layouts.auth')]
class Login extends Component
{
    use LivewireAlert;

    #[Rule('required|numeric|digits:10|min:1000000001|max:9999999999')]
    public $nim;

    #[Rule('required|string|min:8')]
    public $password;

    public $isPasswordVisible = false;

    public function render()
    {
        return view('livewire.login');
    }

    protected function messages()
    {
        return [
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.digits' => 'NIM harus memiliki 10 digit angka.',
            'password.required' => 'Password harus diisi.',
            'password.string' => 'Password harus berupa string.',
            'password.min' => 'Password harus lebih dari 8 karakter',
        ];
    }

    public function togglePasswordVisibility()
    {
        $this->isPasswordVisible = ! $this->isPasswordVisible;
    }

    public function submit()
    {
        $params = $this->validate();

        if (! auth('web')->attempt($params)) {
            return $this->addError('error', 'Invalid username or password.');
        }

        if (auth('web')->user()->profile->role === 'admin') {
            return $this->flash('success', 'Login berhasil, selamat datang kembali admin!', [], route('admin.dashboard'));
        }

        return $this->flash('success', 'Login berhasil, selamat datang kembali '.auth('web')->user()->name, [], route('dashboard'));
    }
}
