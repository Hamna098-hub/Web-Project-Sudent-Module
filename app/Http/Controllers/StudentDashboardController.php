<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        $enrollments = $student->enrollments()
            ->with('course')
            ->where('status', 'enrolled')
            ->get();
        $totalCourses = $enrollments->count();
        return view('student.dashboard',
            compact('student', 'enrollments', 'totalCourses'));
    }
}