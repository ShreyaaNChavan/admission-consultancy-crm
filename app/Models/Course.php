<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [

        'course_code',

        'course_name',

        'duration',

        'fees',

        'status',

    ];

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }
}