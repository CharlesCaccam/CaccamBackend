<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            ['BSCS', 'BS Computer Science', 'Computing', 3, 40],
            ['BSIT', 'BS Information Technology', 'Computing', 3, 40],
            ['BSCE', 'BS Civil Engineering', 'Engineering', 3, 35],
            ['BSEE', 'BS Electrical Engineering', 'Engineering', 3, 35],
            ['BSME', 'BS Mechanical Engineering', 'Engineering', 3, 35],
            ['BSBA', 'BS Business Administration', 'Business', 3, 45],
            ['BSACT', 'BS Accountancy', 'Business', 3, 45],
            ['BSMKT', 'BS Marketing', 'Business', 3, 40],
            ['BSHM', 'BS Hospitality Management', 'Tourism', 3, 40],
            ['BSTM', 'BS Tourism Management', 'Tourism', 3, 40],
            ['BSED', 'BS Education', 'Education', 3, 50],
            ['BEED', 'Bachelor of Elementary Education', 'Education', 3, 50],
            ['BSN', 'BS Nursing', 'Health', 5, 30],
            ['BSPT', 'BS Physical Therapy', 'Health', 5, 25],
            ['BSPSY', 'BS Psychology', 'Arts & Sciences', 3, 45],
            ['BSSW', 'BS Social Work', 'Arts & Sciences', 3, 40],
            ['ABCOM', 'AB Communication', 'Arts & Sciences', 3, 40],
            ['BSARCH', 'BS Architecture', 'Engineering', 5, 30],
            ['BSCRIM', 'BS Criminology', 'Law', 4, 45],
            ['BSPHRM', 'BS Pharmacy', 'Health', 4, 30],
        ];

        foreach ($courses as $c) {
            DB::table('courses')->insert([
                'course_code' => $c[0],
                'course_name' => $c[1],
                'department'  => $c[2],
                'units'       => $c[3],
                'slots'       => $c[4],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}