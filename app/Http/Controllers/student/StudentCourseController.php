<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Enrollment;

class StudentCourseController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        $enrolledIds = Enrollment::where('student_id', $student->id)
            ->where('status', 'enrolled')
            ->pluck('course_id');
        $courses = Course::whereNotIn('id', $enrolledIds)
            ->where('semester', $student->semester)
            ->get();
        return view('student.courses', compact('courses'));
    }

    public function myEnrollments()
    {
        $student = Auth::guard('student')->user();
        $enrollments = Enrollment::where('student_id', $student->id)
            ->with('course')->get();
        return view('student.my-enrollments', compact('enrollments'));
    }

    public function enroll($id)
    {
        $student = Auth::guard('student')->user();
        $exists = Enrollment::where('student_id', $student->id)
            ->where('course_id', $id)
            ->where('status', 'enrolled')
            ->exists();
        if ($exists) {
            return back()->with('error', 'Already enrolled!');
        }
        Enrollment::create([
            'student_id' => $student->id,
            'course_id'  => $id,
            'status'     => 'enrolled',
        ]);
        return back()->with('success', 'Enrolled successfully!');
    }

    public function drop($id)
    {
        $student = Auth::guard('student')->user();
        Enrollment::where('student_id', $student->id)
            ->where('course_id', $id)
            ->delete();
        return back()->with('success', 'Course dropped successfully.');
    }
}