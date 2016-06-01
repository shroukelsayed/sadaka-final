<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharityAddress extends Model
{
    public function charity(){

        return $this->belongsTo(Charity::class); 
    } 

   	public function city(){

        return $this->belongsTo(City::class); 
    }

    public function governorate(){

        return $this->belongsTo(Governorate::class); 
    }

}
