<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function user(){

        return $this->belongsTo(User::class); 
    }

    public function interval(){

        return $this->hasOne(Interval::class);
    }

    public function intervalType(){

        return $this->belongsTo(IntervalType::class);
    }

    public function personDocs(){

        return $this->hasMany(PersonDocument::class);
    }

    public function donationType(){
        return $this->belongsTo(DonationType::class);
    }

    public function personInfo(){

        return $this->belongsTo(PersonInfo::class); 
    }

    public function personStatus(){

        return $this->belongsTo(PersonStatus::class);
    }

    public function blood(){

        return $this->belongsTo(Blood::class);
    }

    public function medicine(){

        return $this->belongsTo(Medicine::class);
    }

    public function money(){

        return $this->belongsTo(Money::class);
    }

    public function other(){

        return $this->belongsTo(Other::class);
    }
	
	public function userpeople(){
        
     return $this->belongsToMany(User::class,'CompaignUsers')->withPivot('user_id', 'person_id','amount','donationDate');

    }    
}
