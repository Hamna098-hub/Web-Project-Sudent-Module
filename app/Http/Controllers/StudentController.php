namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // If you have a 'student' role middleware, add it here:
        // $this->middleware('role:student');
    }

    public function index()
    {
        $student = auth()->user();

        $courses = DB::table('courses')->get();

        // Fetch this student's enrolled course IDs for use in the view
        $enrolledCourseIds = DB::table('enrollments')
            ->where('student_id', $student->id)
            ->pluck('course_id')
            ->toArray();

        return view('student.courses', compact('courses', 'enrolledCourseIds'));
    }

    public function enroll($id)
    {
        $student = auth()->user();

        // 1. Check the course exists
        $course = DB::table('courses')->where('id', $id)->first();
        if (!$course) {
            return back()->with('error', 'Course not found.');
        }

        // 2. Prevent duplicate enrollment
        $alreadyEnrolled = DB::table('enrollments')
            ->where('student_id', $student->id)
            ->where('course_id', $id)
            ->exists();

        if ($alreadyEnrolled) {
            return back()->with('error', 'You are already enrolled in this course.');
        }

        // 3. Insert with timestamp
        DB::table('enrollments')->insert([
            'student_id'  => $student->id,
            'course_id'   => $id,
            'status'      => 'enrolled',
            'enrolled_at' => now(),
        ]);

        return back()->with('success', 'Successfully enrolled in ' . $course->name . '.');
    }

    public function drop($id)
    {
        $student = auth()->user();

        // Check enrollment actually exists before dropping
        $enrollment = DB::table('enrollments')
            ->where('student_id', $student->id)
            ->where('course_id', $id)
            ->first();

        if (!$enrollment) {
            return back()->with('error', 'You are not enrolled in this course.');
        }

        DB::table('enrollments')
            ->where('student_id', $student->id)
            ->where('course_id', $id)
            ->delete();

        return back()->with('success', 'Course dropped successfully.');
    }
}