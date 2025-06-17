<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttendanceLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('attendance_logs')->insert([
            [
                'user_id' => 1,
                'check_in_latitude' => 17.385044,
                'check_in_longitude' => 78.486671,
                'check_out_latitude' => 17.385944,
                'check_out_longitude' => 78.487771,
                'check_in_time' => '2025-06-16 09:00:00',
                'check_out_time' => '2025-06-16 17:00:00',
                'status' => 'present',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'check_in_latitude' => 12.971599,
                'check_in_longitude' => 77.594566,
                'check_out_latitude' => 12.972000,
                'check_out_longitude' => 77.595000,
                'check_in_time' => '2025-06-15 09:15:00',
                'check_out_time' => '2025-06-15 17:05:00',
                'status' => 'present',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'check_in_latitude' => 28.613939,
                'check_in_longitude' => 77.209023,
                'check_out_latitude' => null,
                'check_out_longitude' => null,
                'check_in_time' => '2025-06-16 10:00:00',
                'check_out_time' => null,
                'status' => 'present',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
