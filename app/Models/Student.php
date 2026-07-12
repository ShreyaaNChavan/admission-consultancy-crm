<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [

        'student_code',

        'lead_id',

        'full_name',

        'phone',

        'email',

        'course_id',

        'batch_id',

        'admission_date',

        'status',

    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function feeStructure()
    {
        return $this->belongsTo(FeeStructure::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    
}