<?php
namespace App\Http\Controllers;

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
        return view('student.grades', compact('grades'));
    }
}