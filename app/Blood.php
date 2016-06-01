<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blood extends Model
{
    public function person(){

        return $this->belongsTo(Person::class); 
    } 

    public function city(){

        return $this->belongsTo(City::class); 
    }

    public function governorate(){

        return $this->belongsTo(Governorate::class); 
    }
}
