<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usercompaign extends Model
{
        public function user(){

        return $this->belongsTo(User::class);
    }
    public function compaign(){

        return $this->belongsTo(Compaign::class);
    }

    public function compType(){
        return $this->belongsTo(CompaignDonateType::class);
    }

   
}
