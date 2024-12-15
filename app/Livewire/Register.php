<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Register')]
#[Layout('components.layouts.auth')]
class Register extends Component
{
    use LivewireAlert;

    #[Rule('required|numeric|digits:10|min:1000000001|max:9999999999|unique:users,nim')]
    public $nim;

    #[Rule('required|string')]
    public $name;

    #[Rule('required|unique:users,nickname|regex:/^[a-z0-9._]+$/')]
    public $nickname;

    #[Rule('required|min:8|string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*?&#_]/')]
    public $password;

    #[Rule('required')]
    public $gender;

    #[Rule('required')]
    public $birth_date;

    #[Rule('required|numeric|min:1|max:31')]
    public $date;

    #[Rule('required|numeric|min:1|max:12')]
    public $month;

    #[Rule('required|numeric|min:1900|max:2025')]
    public $year;

    public $isPasswordVisible = false;

    public function render()
    {
        return view('livewire.register');
    }

    public function togglePasswordVisibility()
    {
        $this->isPasswordVisible = ! $this->isPasswordVisible;
    }

    public function generateBirthDate()
    {
        if ($this->date && $this->month && $this->year) {
            return sprintf(
                '%04d-%02d-%02d',
                $this->year,
                $this->month,
                $this->date
            );
        }

        return null;
    }

    public function updated($field)
    {
        if (in_array($field, ['date', 'month', 'year'])) {
            $this->birth_date = $this->generateBirthDate();
        }
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
