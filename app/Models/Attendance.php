<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    public $timestamps = false;
    protected $fillable = ['student_id', 'course_id', 'date', 'status'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}