<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;

class StudentAttendanceController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        $attendances = Attendance::where('student_id', $student->id)
            ->with('course')
            ->get();
        return view('student.attendance', compact('attendances'));
    }
}