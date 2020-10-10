<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designations extends Model
{
    protected $fillable = [
    	'title',
    ];

    //Table Relation
    public function empDesignation(){
        return $this->hasMany('App\Designations','designation_id');
    } 
}
