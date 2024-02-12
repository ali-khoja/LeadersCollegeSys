<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'phone',
        'section',

    ];
    public function courses()
    {
        return $this->hasMany(Course::class , 'teacher_id');
    }

}
