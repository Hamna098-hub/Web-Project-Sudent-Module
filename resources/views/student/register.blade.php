<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Register | University Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #1a237e, #0d47a1); min-height: 100vh; display: flex; align-items: center; padding: 30px 0; }
        .card { border: none; border-radius: 15px; box-shadow: 0 20px 60px rgba(0,0,0,0.3); }
        .card-header { background: linear-gradient(135deg, #1b5e20, #2e7d32); border-radius: 15px 15px 0 0 !important; padding: 25px; }
        .btn-success { background: linear-gradient(135deg, #1b5e20, #2e7d32); border: none; padding: 12px; font-size: 16px; }
        .form-control, .form-select { padding: 12px; border-radius: 8px; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="text-white mb-1">📝 Student Registration</h2>
                    <p class="text-white-50 mb-0">Create your account</p>
                </div>
                <div class="card-body p-4">
                    @if($errors->any())
                        <div class="alert alert-danger">{{ $errors->first() }}</div>
                    @endif
                    <form method="POST" action="{{ route('student.register') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Full Name</label>
                            <input type="text" name="student_name" class="form-control"
                                placeholder="Enter your full name"
                                value="{{ old('student_name') }}" required>
                        </div>
                        <div class="form-group">
    <label for="registration_no">Registration Number</label>
    <input type="text" 
           name="registration_no" 
           id="registration_no"
           class="form-control" 
           placeholder="e.g. CS-F24-001"
           value="{{ old('registration_no') }}"
           required>
    @error('registration_no')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Address</label>
                            <input type="email" name="email" class="form-control"
                                placeholder="Enter your email"
                                value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Department</label>
                            <select name="department" class="form-select" required>
                                <option value="">Select Department</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Software Engineering">Software Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Business Administration">Business Administration</option>
                                <option value="Mathematics">Mathematics</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Semester</label>
                            <select name="semester" class="form-select" required>
                                @for($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}">Semester {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="text" name="phone" class="form-control"
                                placeholder="e.g. 03001234567"
                                value="{{ old('phone') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Minimum 6 characters" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control"
                                placeholder="Repeat your password" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 rounded-pill">
                            Create Account
                        </button>
                    </form>
                    <hr>
                    <div class="text-center">
                        <p class="mb-0">Already have an account?
                            <a href="{{ route('student.login') }}" class="text-success fw-bold">Login Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>