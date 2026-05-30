<?php
namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Grade;

class StudentGradeController extends Controller
{
    public function index()
    {
        $student = Auth::guard('student')->user();
        $grades = Grade::where('student_id', $student->id)
            ->with('course')
            ->get();
        return response()->json(['data' => $grades]);
    }

    public function show($id)
    {
        $student = Auth::guard('student')->user();
        $grade = Grade::where('student_id', $student->id)->find($id);
        if (!$grade) {
            return response()->json(['error' => 'Grade not found'], 404);
        }
        return response()->json(['data' => $grade]);
    }
}