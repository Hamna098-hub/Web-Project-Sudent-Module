<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $fillable = ['course_code', 'course_name', 'credit_hours', 'semester'];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}