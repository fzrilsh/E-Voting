<?php

namespace Database\Seeders;

use App\Models\VoteSchedule;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VoteScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $start = Carbon::now();
        $end = Carbon::now()->addDays(2);

        collect([
            [
                'title' => 'Ketua BEMF Computer Science',
                'description' => 'Pemilihan BEM Fakultas Computer Science',
                'candidates_ids' => [1, 2],
                'start' => $start,
                'end' => $end,
            ],
        ])->each(function ($v) {
            VoteSchedule::query()->create($v);
        });
    }
}
