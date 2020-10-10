<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = ['employee_no', 'name', 'designation_id', 'department', 'company', 'salary', 'joining_date',];

    //Table Relation 
    public function getDesignations(){
		return $this->belongsTo('App\Designations','designation_id');
	}
}
