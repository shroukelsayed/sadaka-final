<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compaign extends Model
{
    public function user(){

        return $this->belongsTo(User::class); 
    }

    public function compaignusers(){


     return $this->belongsToMany(User::class,'CompaignUsers')->withPivot('user_id', 'compaign_id','amount','CompaignDonateType_id');

    }

    public function city(){

        return $this->belongsTo(City::class); 
    }

    public function governorate(){

        return $this->belongsTo(Governorate::class); 
    }
}
