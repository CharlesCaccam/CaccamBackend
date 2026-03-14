<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SchoolDay;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function summary()
    {
        $totalPresent = SchoolDay::sum('present');
        $totalAbsent  = SchoolDay::sum('absent');
        $total        = $totalPresent + $totalAbsent;
        $rate         = $total > 0 ? round(($totalPresent / $total) * 100, 1) . '%' : '0%';

        return response()->json([
            'totalStudents'  => Student::count(),
            'totalCourses'   => Course::count(),
            'attendanceRate' => $rate,
            'schoolDays'     => SchoolDay::count(),
        ]);
    }

    public function enrollmentTrends()
    {
        $data = Student::selectRaw("DATE_FORMAT(created_at, '%b') as month, MONTH(created_at) as month_num, COUNT(*) as enrolled")
            ->groupBy('month', 'month_num')
            ->orderBy('month_num')
            ->get()
            ->map(fn($row) => [
                'month'    => $row->month,
                'enrolled' => (int) $row->enrolled,
            ]);

        return response()->json($data);
    }

    public function courseDistribution()
    {
        $data = Course::leftJoin('students', 'courses.course_code', '=', 'students.course_code')
            ->selectRaw('courses.course_code as course, COUNT(students.id) as students')
            ->groupBy('courses.course_code')
            ->orderByDesc('students')
            ->get()
            ->map(fn($c) => [
                'course'   => $c->course,
                'students' => (int) $c->students,
            ]);

        return response()->json($data);
    }

 public function attendance()
{
    $rows = SchoolDay::selectRaw("date, present, absent")
        ->orderBy('date')
        ->get();

    $weeks = [];
    foreach ($rows as $row) {
        $weekNum = ceil(\Carbon\Carbon::parse($row->date)->dayOfYear / 7);
        if (!isset($weeks[$weekNum])) {
            $weeks[$weekNum] = ['present' => 0, 'absent' => 0];
        }
        $weeks[$weekNum]['present'] += (int) $row->present;
        $weeks[$weekNum]['absent']  += (int) $row->absent;
    }

    // Relabel as Week 1, 2, 3...
    $result = [];
    $i = 1;
    foreach ($weeks as $data) {
        $result[] = [
            'day'     => 'Week ' . $i++,
            'present' => $data['present'],
            'absent'  => $data['absent'],
        ];
        if ($i > 10) break;
    }

    return response()->json($result);
}
}
