<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CharityDocument extends Model
{
    public function charity(){

        return $this->belongsTo(Charity::class); 
    } 
}
