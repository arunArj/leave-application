<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;
    protected $fillable = ['department','reporting_emails'];

    protected function insertAndSetId(Builder $query, $attributes)
    {

        if(is_array($attributes['reporting_emails']))
        $attributes['reporting_emails']= implode(",", $attributes['reporting_emails']);
        $id = $query->insertGetId($attributes, $keyName = $this->getKeyName());

        $this->setAttribute($keyName, $id);
    }

    public function employeeDetails(){
        return $this->hasMany(EmployeeDetails::class);
    }


}
