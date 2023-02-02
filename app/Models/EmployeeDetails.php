<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'job_status',
        'permanant_status_date',
        'mail_id',
        'image',
        'joining_date',
        'designation',
        'employee_id',
        'casual_leave',
        'sick_leave',
        'status',
        'optional_holiday_used',
        'gender',
        'marital_status',
        'saturday_leave',
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function departments(){

        return $this->belongsTo(Departments::class,'department_id');
    }
}
