@extends('student.layouts.app')
@section('content')

<div class="card">
    <div class="card-header text-white fw-bold" style="background:#1a237e;">
        <i class="fas fa-calendar-check me-2"></i>My Attendance
    </div>
    <div class="card-body">
        @if($attendances->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-calendar fa-4x text-muted mb-3"></i>
                <h5 class="text-muted">No attendance records found yet.</h5>
            </div>
        @else
            <div class="table-responsive">
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
                            <td>
                                <span class="badge bg-primary">
                                    {{ $a->course->course_code }}
                                </span>
                            </td>
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
            </div>
        @endif
    </div>
</div>

@endsection