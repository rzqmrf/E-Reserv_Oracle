<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $fieldIds = Field::query()->pluck('id');
        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];

        foreach ($fieldIds as $fieldId) {
            foreach ($days as $day) {
                Schedule::create([
                    'field_id' => $fieldId,
                    'day_of_week' => $day,
                    'open_time' => '08:00:00',
                    'close_time' => '22:00:00',
                    'is_open' => 1,
                ]);
            }
        }
    }
}
