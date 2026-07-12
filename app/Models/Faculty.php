<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [

        'faculty_code',

        'full_name',

        'qualification',

        'specialization',

        'phone',

        'email',

        'status',

    ];

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    
}