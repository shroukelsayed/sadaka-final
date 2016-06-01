<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationType extends Model
{
    public function person(){

        return $this->hasOne(Person::class); 
    }
}
