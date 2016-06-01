<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
    public function person(){

        return $this->belongsTo(Person::class); 
    } 
}
