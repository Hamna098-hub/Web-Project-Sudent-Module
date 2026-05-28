<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Login | University Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1a237e, #0d47a1); min-height: 100vh; display: flex; align-items: center; }
        .card { border: none; border-radius: 15px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        .card-header { background: linear-gradient(135deg, #1a237e, #0d47a1); border-radius: 15px 15px 0 0 !important; padding: 25px; }
        .btn-primary { background: linear-gradient(135deg, #1a237e, #0d47a1); border: none; padding: 12px; font-size: 16px; }
        .btn-primary:hover { background: linear-gradient(135deg, #0d47a1, #1a237e); }
        .form-control { padding: 12px; border-radius: 8px; }
        .form-control:focus { box-shadow: 0 0 0 3px rgba(26,35,126,0.2); border-color: #1a237e; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="text-white mb-1">🎓 University Portal</h2>
                    <p class="text-white-50 mb-0">Student Login</p>
                </div>
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('student.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill">Login</button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <p class="mb-0">Don't have an account? <a href="{{ route('student.register') }}" class="text-primary fw-bold">Register Here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>