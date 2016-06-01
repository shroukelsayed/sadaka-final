<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interval extends Model
{
    public function person(){

        return $this->belongsTo(Person::class); 
    } 
}
