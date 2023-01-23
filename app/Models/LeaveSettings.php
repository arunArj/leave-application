<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'days_limit',
        'days_gap',
        'casual_per_month',
        'sick_per_month',
        'max_maternity',
        'max_paternity',
        'max_bereavement',
        'max_other_leave',
        'carry_forward_per_year'
    ];
}

