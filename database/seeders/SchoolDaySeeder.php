<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolDaySeeder extends Seeder
{
    public function run(): void
    {
        $holidays = ['2024-06-12', '2024-08-26', '2024-11-01', '2024-11-30', '2024-12-25', '2024-12-30'];
        $events   = ['2024-07-15', '2024-09-20', '2024-10-05', '2024-11-15'];

        $start = strtotime('2024-06-01');
        $end   = strtotime('2024-12-31');

        for ($ts = $start; $ts <= $end; $ts += 86400) {
            $date    = date('Y-m-d', $ts);
            $weekday = date('N', $ts);
            if ($weekday >= 6) continue; // skip weekends

            if (in_array($date, $holidays)) {
                $type = 'holiday'; $label = 'Holiday'; $present = 0; $absent = 0;
            } elseif (in_array($date, $events)) {
                $type = 'event'; $label = 'School Event'; $present = rand(400, 480); $absent = 500 - $present;
            } else {
                $type = 'class'; $label = null; $present = rand(420, 490); $absent = 500 - $present;
            }

            DB::table('school_days')->insert([
                'date' => $date, 'type' => $type, 'label' => $label,
                'present' => $present, 'absent' => $absent,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}