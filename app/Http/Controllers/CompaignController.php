<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;
use Auth;
use App\Compaign;
use Illuminate\Http\Request;
use Input;


class CompaignController extends Controller {
	
	public function __construct()
	{
        if(Auth::guest() || Auth::user()->user_type_id == 4){  
          
	    	$this->middleware('auth',['except' =>[ 'show','index','comps']]);
	    }
	  	else
	    	$this->middleware('auth', ['except' => ['index']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$compaigns = Compaign::where('user_id','=',Auth::user()->id)->get();

		return view('compaigns.index', compact('compaigns'));
	}
	public function comps()
	{
		$comps = Compaign::orderBy('id', 'desc')->limit(4)->get();

		return view('compaigns.compaign',compact('comps'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$governrates=Governorate::all();
		$cities=City::all();
		// var_dump($governrates);die;
		return view('compaigns.create' , compact('governrates','cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		
    	$compaign = new Compaign();
		$compaign->title = $request->input("title");
        $compaign->location = $request->input("location");
        $compaign->startdate = $request->input("startdate");
        $compaign->enddate = $request->input("enddate");
        $compaign->budget = $request->input("budget");
        $compaign->description = $request->input("description");
        $compaign->governorate_id = $request->input("governorate");
        $compaign->city_id = $request->input("city");
        
        $compaign->user_id=Auth::user()->id;

        if ($request->hasFile('image')) {
        $file = array('image' => Input::file('image'));
        $destinationPath = 'compagin/'; // upload path
        $extension = Input::file('image')->getClientOriginalExtension(); 
        $fileName = rand(11111,99999).'.'.$extension; // renaming image
        Input::file('image')->move($destinationPath, $fileName);
       
    	$compaign->image=$fileName;
    		
        }
        else
       {
        echo "Please Upload Your Profile Image!";
       }

		$compaign->save();

		return redirect()->route('compaigns.index')->with('message', 'Item created successfully.');
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$compaign = Compaign::findOrFail($id);
		if(Auth::guest() || Auth::user()->user_type_id == 4){
            
            return view('compaigns.more',  compact('compaign'));
        }
        else{	

			return view('compaigns.show', compact('compaign'));
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$compaign = Compaign::findOrFail($id);
		$governrates=Governorate::all();
		$cities=City::all();	

		return view('compaigns.edit', compact('compaign','governrates','cities'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$compaign = Compaign::findOrFail($id);	
		$compaign->title = $request->input("title");
        $compaign->location = $request->input("location");
        $compaign->startdate = $request->input("startdate");
        $compaign->enddate = $request->input("enddate");
     	$compaign->governorate_id = $request->input("governorate");
        $compaign->city_id = $request->input("city_id");
        $compaign->budget = $request->input("budget");
        $compaign->description = $request->input("description");

        if ($request->hasFile('image')) {
	        $file = array('image' => \Input::file('image'));
	        $destinationPath = 'compagin/'; // upload path
	        $extension = \Input::file('image')->getClientOriginalExtension(); 
	        $fileName = rand(11111,99999).'.'.$extension; // renaming case_doc
	        \Input::file('image')->move($destinationPath, $fileName);
	        	$compaign->image=$fileName;
	    		    	
	    }	


		$compaign->save();

		return redirect()->route('compaigns.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$compaign = Compaign::findOrFail($id);
		$compaign->delete();

		return redirect()->route('compaigns.index')->with('message', 'Item deleted successfully.');
	}

}
