<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Userperson;
use App\usercompaign;
use App\Blood;
use App\Money;
use App\Medicine;

class UserpersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos=Userperson::all();
        $comps=usercompaign::all();
        return view('userperson.index', compact('infos','comps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $donate = new Userperson();
        $donate->amount = $request->input("aa");
        $donate->donationdate =$request->input("date");
        $donate->user_id=Auth::user()->id;
        $donate->person_id=$request->input("person");
        $donate->payment=$request->input("payment");
        $donate->checked=0;
        $donate->save();
        return redirect()->action("PersonController@cases")->with('message', 'Item created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person_info=Userperson::findOrFail($id);
    
        // var_dump($person_info->user->name);die;
        
        return view('userperson.show', compact('person_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approveDonation($id){
        // var_dump($id) or die;
        $personDonator = Userperson::findOrFail($id);
        $personDonator->checked = 1;

        if($personDonator->person->donation_type_id == 2){
            $money = Money::findOrFail($personDonator->person->money->id);
            $money->paid = $money->paid+$personDonator->amount;
            $money->save();
        }

        $personDonator->save();
        return redirect()->action('UserpersonController@show',$id);
    }
}
