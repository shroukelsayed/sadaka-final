<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    public function user(){


    		return $this->belongsTo(User::class);
    }

     public function charityAddress(){


    		return $this->hasMany(CharityAddress::class);
    }

    public function charityDocument(){


    		return $this->hasMany(CharityDocument::class);
    }
}
