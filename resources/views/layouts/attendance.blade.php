@extends('student.layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fas fa-calendar-check me-2"></i>My Attendance
    </div>
    <div class="card-body">
        @if($attendances->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-calendar fa-3x text-muted mb-3"></i>
                <p class="text-muted">No attendance records found yet.</p>
            </div>
        @else
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendances as $i => $a)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><strong>{{ $a->course->course_name }}</strong></td>
                        <td><span class="badge bg-primary">{{ $a->course->course_code }}</span></td>
                        <td>{{ \Carbon\Carbon::parse($a->date)->format('d M Y') }}</td>
                        <td>
                            <span class="badge fs-6 bg-{{ $a->status == 'present' ? 'success' : 'danger' }}">
                                <i class="fas fa-{{ $a->status == 'present' ? 'check' : 'times' }} me-1"></i>
                                {{ ucfirst($a->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection