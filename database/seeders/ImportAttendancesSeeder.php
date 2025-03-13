<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Attendance;

class ImportAttendancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        Attendance::truncate();

        // Import from your existing MySQL table
        $attendances = DB::connection('mysql')
            ->table('attendances')
            ->get();

        foreach ($attendances as $attendance) {
            Attendance::create((array) $attendance);
        }

        $this->command->info('Imported ' . count($attendances) . ' attendance records');
    }
}
