<?php

namespace App\Http\Controllers;

use Auth;
use App\Person;
use App\PersonInfo;
use App\Compaign;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( isset(Auth::user()->id) and (Auth::user()->user_type_id == 1 )){
            
            return \Redirect::to('/admin');

        }elseif(isset(Auth::user()->id) and (Auth::user()->user_type_id == 2)){

            if(isset(Auth::user()->id) and (Auth::user()->approved == 1 )){
                return \Redirect::to('/people');
            }else{
                \Session::flush();
                return view('approved');
            }
        }elseif(isset(Auth::user()->id) and (Auth::user()->user_type_id == 3)){

            if(isset(Auth::user()->id) and (Auth::user()->approved == 1 )){
                return \Redirect::to('/people');
            }else{
                \Session::flush();
                return view('approved');
            }
        }elseif(isset(Auth::user()->id) and (Auth::user()->user_type_id == 4)){
              
                $people = Person::where('person_status_id','!=','3')->limit(8)->get();
                $compaigns= Compaign::orderBy('id', 'desc')->limit(2)->get();

            return view('home', compact('people','compaigns'));
        }
        else{
                $people = Person::where('person_status_id','!=','3')->limit(8)->get();
                $compaigns= Compaign::orderBy('id', 'desc')->limit(2)->get();

            return view('home', compact('people','compaigns'));
        }
    }
}
