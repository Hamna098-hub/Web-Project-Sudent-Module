<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Portal | University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; }
        .sidebar {
            background: linear-gradient(180deg, #1a237e, #0d47a1);
            min-height: 100vh;
            padding: 0;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 14px 20px;
            border-radius: 8px;
            margin: 3px 10px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: rgba(255,255,255,0.2);
            color: white;
        }
        .sidebar .nav-link i { width: 20px; margin-right: 10px; }
        .sidebar-header {
            padding: 25px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .topbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 15px 25px;
        }
        .main-content { padding: 25px; }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        }
        .table thead th {
            background: #1a237e;
            color: white;
            border: none;
        }
        .btn { border-radius: 8px; }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <div class="row g-0">

        {{-- Sidebar --}}
        <div class="col-md-2 sidebar">
            <div class="sidebar-header">
                <h5 class="text-white mb-1">🎓Portal</h5>
                <small class="text-white-50">Student Panel</small>
            </div>
            <nav class="nav flex-column mt-2">
                <a href="{{ route('student.dashboard') }}"
                   class="nav-link {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('student.courses') }}"
                   class="nav-link {{ request()->routeIs('student.courses') ? 'active' : '' }}">
                    <i class="fas fa-book-open"></i> Browse Courses
                </a>
                <a href="{{ route('student.my-enrollments') }}"
                   class="nav-link {{ request()->routeIs('student.my-enrollments') ? 'active' : '' }}">
                    <i class="fas fa-list-check"></i> My Courses
                </a>
                <a href="{{ route('student.grades') }}"
                   class="nav-link {{ request()->routeIs('student.grades') ? 'active' : '' }}">
                    <i class="fas fa-star"></i> My Grades
                </a>
                <a href="{{ route('student.attendance') }}"
                   class="nav-link {{ request()->routeIs('student.attendance') ? 'active' : '' }}">
                    <i class="fas fa-calendar-check"></i> Attendance
                </a>
                <hr style="border-color: rgba(255,255,255,0.2); margin: 10px 15px;">
                <form method="POST" action="{{ route('student.logout') }}">
                    @csrf
                    <button type="submit"
                        class="nav-link border-0 bg-transparent w-100 text-start">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </nav>
        </div>

        {{-- Main Content --}}
        <div class="col-md-10">
            <div class="topbar d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-muted">
                    Welcome, <strong>{{ Auth::guard('student')->user()->student_name }}</strong>
                </h6>
                <div>
                    <span class="badge bg-primary">
                        {{ Auth::guard('student')->user()->department }}
                    </span>
                    <span class="badge bg-success ms-1">
                        Semester {{ Auth::guard('student')->user()->semester }}
                    </span>
                </div>
            </div>

            <div class="main-content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>