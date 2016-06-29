<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\usercompaign;
use App\Compaign;

class UserCompaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $share = new usercompaign();
      
        $share->user_id=Auth::user()->id;
        $share->compaign_id =$request->input("id");
        // var_dump($share->compaign_id);die;
        $type=$request->input("type");   
        $share->donate_type_id = $type;
        $share->checked = 0;
        if($type ==1) 
            {
               $share->amount = 0;
            }
            else   
            {
                $share->amount = $request->input("amount");
            }
        $share->save();
        return redirect()->action("CompaignController@comps")->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person_info=usercompaign::findOrFail($id);
    
        $image = $person_info->compaign->image;
        
        return view('usercompaign.show', compact('person_info','image'));   
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

    public function approveCompaignDonation($id){
        // var_dump($id) or die;
        $compaignDonator = usercompaign::findOrFail($id);
        $compaignDonator->checked = 1;

        if( !($compaignDonator->compaign->donate_type_id == 1)){
           $compaign = Compaign::findOrFail($compaignDonator->compaign->id);
           $compaign->paid = $compaign->paid+$compaignDonator->amount;
           $compaign->save();
        }

        $compaignDonator->save();
        return redirect()->action('UserCompaignController@show',$id);
    }
}
