<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\Employee;
use App\Models\Activity;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard view with summarized data.
     */
    public function index()
    {
        // Fetch summarized data
        $totalStudents = Student::count();
        $totalTeachers = Teacher::count();
        // $totalCourses = Course::count();
        $totalEmployees = Employee::count();

        return view('dashboard.index', [
            // Pass data to the view
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            // 'totalCourses' => $totalCourses,
            'totalEmployees' => $totalEmployees,
        ]);
    }

    /**
     * Get statistics as a JSON response.
     */
    public function getStatistics()
    {
        $statistics = [
            'totalStudents' => Student::count(),
            'totalTeachers' => Teacher::count()
            // 'totalCourses' => Course::count(),
            // 'totalEmployees' => Employee::count(),
            // 'recentActivities' => Activity::with('user')
                ->latest()
                ->take(10)
                ->get()
                ->map(function ($activity) {
                    return [
                        'date' => $activity->created_at->format('Y-m-d H:i'),
                        'activity' => $activity->description,
                        'user' => $activity->user->name ?? 'N/A',
                    ];
                }),
        ];

        return response()->json($statistics);
    }
}
