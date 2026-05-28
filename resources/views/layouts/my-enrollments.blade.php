@extends('student.layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <span><i class="fas fa-list-check me-2"></i>My Enrolled Courses</span>
        <a href="{{ route('student.courses') }}" class="btn btn-light btn-sm">+ Add Course</a>
    </div>
    <div class="card-body">
        @if($enrollments->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                <p class="text-muted">No enrollments found.</p>
                <a href="{{ route('student.courses') }}" class="btn btn-primary">Browse Courses</a>
            </div>
        @else
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Code</th>
                        <th>Credits</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrollments as $i => $e)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><strong>{{ $e->course->course_name }}</strong></td>
                        <td><span class="badge bg-primary">{{ $e->course->course_code }}</span></td>
                        <td>{{ $e->course->credit_hours }}</td>
                        <td>
                            <span class="badge bg-{{ $e->status == 'enrolled' ? 'success' : 'danger' }} fs-6">
                                {{ ucfirst($e->status) }}
                            </span>
                        </td>
                        <td>
                            @if($e->status == 'enrolled')
                            <form method="POST" action="{{ route('student.drop', $e->course_id) }}"
                                  onsubmit="return confirm('Are you sure you want to drop this course?')">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-times me-1"></i>Drop
                                </button>
                            </form>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection