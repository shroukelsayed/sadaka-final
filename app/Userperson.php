<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userperson extends Model
{
    public function person(){

        return $this->belongsTo(Person::class);
    }
    public function user(){

        return $this->belongsTo(User::class);
    }
}
