<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompaignDonateType extends Model
{
      public function usercomp(){

        return $this->hasOne(usercompaign::class); 
    }
}
