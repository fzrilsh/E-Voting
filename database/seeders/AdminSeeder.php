<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::query()->create([
            'nim' => '1111111111',
            'name' => 'E-Voting Admin',
            'nickname' => 'admin',
            'password' => Hash::make('admin123__@@'),
        ]);

        $admin->profile()->create(['role' => 'admin']);
    }
}
