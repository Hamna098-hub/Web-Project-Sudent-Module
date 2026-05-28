@extends('student.layouts.app')
@section('content')
<div class="card">
    <div class="card-header bg-primary text-white">
        <i class="fas fa-star me-2"></i>My Grades
    </div>
    <div class="card-body">
        @if($grades->isEmpty())
            <div class="text-center py-4">
                <i class="fas fa-hourglass-half fa-3x text-muted mb-3"></i>
                <p class="text-muted">No grades available yet. Check back after your exams!</p>
            </div>
        @else
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Code</th>
                        <th>Marks</th>
                        <th>Grade</th>
                        <th>GPA Points</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grades as $i => $g)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td><strong>{{ $g->course->course_name }}</strong></td>
                        <td><span class="badge bg-primary">{{ $g->course->course_code }}</span></td>
                        <td>{{ $g->marks }}</td>
                        <td>
                            <span class="badge fs-6
                                {{ $g->grade == 'A' || $g->grade == 'A+' ? 'bg-success' :
                                   ($g->grade == 'B' || $g->grade == 'B+' ? 'bg-primary' :
                                   ($g->grade == 'C' ? 'bg-warning text-dark' : 'bg-danger')) }}">
                                {{ $g->grade }}
                            </span>
                        </td>
                        <td><strong>{{ $g->gpa_points }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection