<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Seeder;

class CandidatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Fazril',
                'photo' => 'img/image.jpeg',
                'serial_number_id' => 1,
            ],
            [
                'name' => 'Shahnaz',
                'photo' => 'img/image.jpeg',
                'serial_number_id' => 1,
            ],
            [
                'name' => 'Ridwan Kamil',
                'photo' => 'img/image.jpeg',
                'serial_number_id' => 2,
            ],
            [
                'name' => 'Suswono',
                'photo' => 'img/image.jpeg',
                'serial_number_id' => 2,
            ],
        ])->each(function ($v) {
            Candidate::query()->create($v);
        });
    }
}
