<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    use HasFactory;

    protected $fillable = [

        'lead_id',

        'counselor_id',

        'followup_date',

        'followup_type',

        'remarks',

        'next_followup',

        'status',

    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function counselor()
    {
        return $this->belongsTo(User::class,'counselor_id');
    }

    
}