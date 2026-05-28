<h1>My Enrolled Courses</h1>

@foreach($enrollments as $enrollment)

    <h3>{{ $enrollment->course->course_name }}</h3>

    <p>Code: {{ $enrollment->course->course_code }}</p>

    <p>Status: {{ $enrollment->status }}</p>

    <hr>

@endforeach