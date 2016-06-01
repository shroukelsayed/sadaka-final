<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonStatus extends Model
{
    public function person(){

        return $this->hasOne(Person::class); 
    }
}
