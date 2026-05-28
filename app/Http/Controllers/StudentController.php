namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StudentCourseController extends Controller
{
    public function index()
    {
        $courses = DB::table('courses')->get();
        return view('student.courses', compact('courses'));
    }

    public function enroll($id)
    {
        $student = auth()->user();

        DB::table('enrollments')->insert([
            'student_id' => $student->id,
            'course_id' => $id,
            'status' => 'enrolled'
        ]);

        return back();
    }

    public function drop($id)
    {
        $student = auth()->user();

        DB::table('enrollments')
            ->where('student_id', $student->id)
            ->where('course_id', $id)
            ->delete();

        return back();
    }
}