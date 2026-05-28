@extends('student.layouts.app')
@section('content')
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #1a237e, #0d47a1);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 opacity-75">Enrolled Courses</p>
                    <h2 class="mb-0 fw-bold">{{ $totalCourses }}</h2>
                </div>
                <i class="fas fa-book fa-2x opacity-75"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #1b5e20, #2e7d32);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 opacity-75">Department</p>
                    <h6 class="mb-0 fw-bold">{{ $student->department }}</h6>
                </div>
                <i class="fas fa-university fa-2x opacity-75"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #b71c1c, #c62828);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 opacity-75">Semester</p>
                    <h2 class="mb-0 fw-bold">{{ $student->semester }}</h2>
                </div>
                <i class="fas fa-graduation-cap fa-2x opacity-75"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card" style="background: linear-gradient(135deg, #e65100, #ef6c00);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <p class="mb-1 opacity-75">Phone</p>
                    <h6 class="mb-0 fw-bold">{{ $student->phone }}</h6>
                </div>
                <i class="fas fa-phone fa-2x opacity-75"></i>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fas fa-list me-2"></i>My Active Courses
    </div>
    <div class="card-body">
        @if($enrollments->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-book-open fa-3x text-muted mb-3"></i>
                <p class="text-muted">You are not enrolled in any courses yet.</p>
                <a href="{{ route('student.courses') }}" class="btn btn-primary">Browse Courses</a>
            </div>
        @else
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Code</th>
                        <th>Credit Hours</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $i => $e)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><strong>{{ $e->course->course_name }}</strong></td>
                        <td><span class="badge bg-primary">{{ $e->course->course_code }}</span></td>
                        <td>{{ $e->course->credit_hours }}</td>
                        <td>{{ $e->course->semester }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection