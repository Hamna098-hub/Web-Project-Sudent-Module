<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public $timestamps = false;
    protected $fillable = ['student_id', 'course_id', 'marks', 'grade', 'gpa_points'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}