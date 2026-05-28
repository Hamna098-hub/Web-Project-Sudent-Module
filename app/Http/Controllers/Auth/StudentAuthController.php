<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentAuthController extends Controller
{
    public function showLogin()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $student = Student::where('email', $request->email)->first();

        if ($student && Hash::check($request->password, $student->password)) {
            Auth::guard('student')->login($student);
            return redirect()->route('student.dashboard');
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function showRegister()
    {
        return view('student.register');
    }

    public function register(Request $request)
    {
        $request->validate([
    'registration_no' => 'required|string|unique:students,registration_no',
    'student_name'    => 'required|string|max:255',
    'email'           => 'required|email|unique:students',
    'password'        => 'required|min:6|confirmed',
    'department'      => 'required|string',
    'semester'        => 'required|integer',
    'phone'           => 'required|string',
]);

       Student::create([
    'registration_no' => $request->registration_no, 
    'student_name'    => $request->student_name,
    'email'           => $request->email,
    'password'        => Hash::make($request->password),
    'department'      => $request->department,
    'semester'        => $request->semester,
    'phone'           => $request->phone,
]);

        return redirect()->route('student.login')->with('success', 'Account created! Please login.');
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        return redirect()->route('student.login');
    }
}