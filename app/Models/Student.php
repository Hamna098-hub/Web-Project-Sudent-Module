<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
   protected $fillable = [
    'registration_no',  
    'student_name',
    'email',
    'password',
    'department',
    'semester',
    'phone'
];
    protected $hidden = ['password'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}