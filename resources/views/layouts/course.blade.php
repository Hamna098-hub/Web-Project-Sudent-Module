@extends('student.layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span><i class="fas fa-book-open me-2"></i>Available Courses</span>
        <a href="{{ route('student.my-enrollments') }}" class="btn btn-light btn-sm">My Enrollments</a>
    </div>
    <div class="card-body">
        @if($courses->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                <p class="text-muted">You are enrolled in all available courses!</p>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $i => $course)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><strong>{{ $course->course_name }}</strong></td>
                        <td><span class="badge bg-primary">{{ $course->course_code }}</span></td>
                        <td>{{ $course->credit_hours }}</td>
                        <td>{{ $course->semester }}</td>
                        <td>
                            <form method="POST" action="{{ route('student.enroll', $course->id) }}">
                                @csrf
                                <button class="btn btn-success btn-sm">
                                    <i class="fas fa-plus me-1"></i>Enroll
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection