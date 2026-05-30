<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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
        return response()->json(['data' => $attendances]);
    }

    public function show($id)
    {
        $student = Auth::guard('student')->user();
        $attendance = Attendance::where('student_id', $student->id)->find($id);
        if (!$attendance) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        return response()->json(['data' => $attendance]);
    }
}