<?php

namespace App;

use App\Student;
use App\Teacher;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = [
        'name',
        'code' ,
        'description',
        'stdate',
        'time',
        'days',
        'branch',
        'teacher_id',
        'statue'
    ];

    public function students()
    {
        return $this->hasMany(Student::class , 'course_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class , 'teacher_id');
    }
}
