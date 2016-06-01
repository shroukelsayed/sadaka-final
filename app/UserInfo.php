<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    public function user(){

		return $this->belongsTo(User::class);
    }

    public function city(){

        return $this->belongsTo(City::class); 
    }

    public function governorate(){

        return $this->belongsTo(Governorate::class); 
    }
}
