<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $fillable = [

        'course_id',

        'batch_name',

        'trainer_name',

        'start_date',

        'end_date',

        'timing',

        'capacity',

        'status',

    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}