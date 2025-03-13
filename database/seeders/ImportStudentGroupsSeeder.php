<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\StudentGroup;

class ImportStudentGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        StudentGroup::truncate();

        // Import from your existing MySQL table
        $groups = DB::connection('mysql')
            ->table('student_groups')
            ->get();

        foreach ($groups as $group) {
            StudentGroup::create((array) $group);
        }

        $this->command->info('Imported ' . count($groups) . ' student groups');
    }
}
