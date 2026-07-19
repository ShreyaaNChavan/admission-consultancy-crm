<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [

        'employee_id',

        'payroll_month',

        'payroll_year',

        'basic_salary',

        'allowances',

        'deductions',

        'overtime',

        'net_salary',

        'payment_date',

        'status',

    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    
}