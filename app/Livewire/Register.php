<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register')]
class Register extends Component
{
    use LivewireAlert;

    #[Rule('required|string')]
    public $name;

    #[Rule('required|unique:users,username|regex:/^[a-z0-9._]+$/')]
    public $username;

    #[Rule('required|email|unique:users,email')]
    public $email;

    #[Rule('required|min:8|confirmed')]
    public $password;

    public function render()
    {
        return view('livewire.register');
    }

    public function submit()
    {
        $params = $this->validate();
        $params['password'] = Hash::make($this->password);

        $user = User::query()->create($params);
        $user->profile()->create(['role' => 'user']);

        return $this->flash('success', 'Register berhasil, silahkan login untuk masuk.', [], '/login');
    }
}
