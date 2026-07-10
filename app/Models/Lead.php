<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [

        'lead_code',

        'full_name',

        'phone',

        'email',

        'course_id',

        'source_id',

        'assigned_to',

        'status',

        'remarks',

        'created_by',

    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function counselor()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function source()
    {
        return $this->belongsTo(LeadSource::class, 'source_id');
    }

    public function followups()
    {
        return $this->hasMany(Followup::class);
    }
}