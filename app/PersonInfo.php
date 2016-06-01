<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonInfo extends Model
{
    public function city(){

        return $this->belongsTo(City::class); 
    }

    public function governorate(){

        return $this->belongsTo(Governorate::class); 
    }
     public function people(){

        return $this->hasMany(Person::class); 
    }
}
