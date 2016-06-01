<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function userInfo(){

        return $this->hasOne(UserInfo::class); 
    }

    public function charity(){

        return $this->hasOne(Charity::class); 
    }

    public function usertype(){


            return $this->belongsTo(UserType::class);
    }

    public function compaigns(){


            return $this->hasMany(Compaign::class);
    }

    public function people(){


            return $this->hasMany(Person::class);
    }

    public function compaignusers(){

     return $this->belongsToMany(Compaign::class,'CompaignUsers')->withPivot('user_id', 'compaign_id','amount','CompaignDonateType_id');

    }

    public function userpeople(){
        
     return $this->belongsToMany(Person::class,'CompaignUsers')->withPivot('user_id', 'person_id','amount','donationDate');

    }

}
