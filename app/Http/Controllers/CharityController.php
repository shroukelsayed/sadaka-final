<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;
use App\Charity;
use Auth;
use DB;

use App\Compaign;
use App\DonationType;
use App\Person;
use App\PersonInfo;
use Illuminate\Http\Request;
use App\CharityAddress;
use App\CharityDocument;
use Illuminate\Support\Facades\Input;
class CharityController extends Controller {

	public function __construct()
	{
		$this->middleware('auth',['except' =>[ 'show','create','store','check']]);
		$this->middleware('admin',['only' =>[ 'index','approve','disapprove']]);
	    
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$charities=Charity::all();
		return view('charities.index', compact('charities'));
		// $personinfo= PersonInfo::all();
		// return view('people.index', compact('personinfo'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	

	public function home()
	{

	$compaigns=Compaign::where('user_id','=',Auth::user()->id)->get();
	$cases=Person::where('user_id','=',Auth::user()->id)->get();
	return view('charities.home', compact('compaigns','cases'));

	}


	public function create()
	{
		$governrate=Governorate::all();
		$city=City::all();
		return view('charities.create',compact('charity','governrate','city'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		DB::beginTransaction();

		try {
			$user= new User();
	        $user->name = $request->input('name');
	        $user->email = $request->input('email');
	        $user->password = bcrypt($request->input('password'));
	        $user->phone=$request->input('phone');
	        $user->user_type_id = 2;
			$user->save();
		} catch(ValidationException $e)
		{
		    // Rollback and then redirect
		    // back to form with errors
		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e)
		{
		    DB::rollback();
		    throw $e;
		}
		
		try{
			$charity = new Charity();
			$charity->taxnum = $request->input("taxnum");
	        $charity->publishdate = $request->input("publishdate");
	        $charity->credit=$request->input("credit");
	        $charity->user_id =$user->id;
			$charity->save();
		} catch(ValidationException $e)
		{
		    // Rollback and then redirect
		    // back to form with errors
		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e)
		{
		    DB::rollback();
		    throw $e;
		}
		
		try{
			$charityAddress=new CharityAddress();
			$charityAddress->address=$request->input('address');
			$charityAddress->charity_id=$charity->id;
			$charityAddress->city_id=$request->input('city');
			$charityAddress->governorate_id=$request->input('level');
			
			$charityAddress->save();

		
			if ($request->hasFile('image')) {
	        $file = array('image' => Input::file('image'));
	        $destinationPath = 'img/'; // upload path
	        $extension = Input::file('image')->getClientOriginalExtension(); 
	        $fileName = rand(11111,99999).'.'.$extension; // renaming image
	        Input::file('image')->move($destinationPath, $fileName);
	        $doc = new CharityDocument();
	    		$doc->doc=$fileName;
	    		$doc->charity_id=$charity->id;
	    		$doc->save();
	        }
	        else
	       {
	        echo "Please Upload Your Profile Image!";
	       }
	        if ($request->hasFile('image1')) {
	        $file1 = array('image1' => Input::file('image1'));
	        $destinationPath = 'img/'; // upload path
	        $extension = Input::file('image1')->getClientOriginalExtension(); 
	        $fileName1 = rand(11111,99999).'.'.$extension; // renaming image
	        Input::file('image1')->move($destinationPath, $fileName1);
	    	$doc1 = new CharityDocument();
	    		$doc1->doc=$fileName1;
	    		$doc1->charity_id=$charity->id;
	    		$doc1->save();

	    	}	
	    	else
	    	{
	        	echo "Please Upload Your Profile Image!";
	    	}
	    } catch(ValidationException $e)
		{
		    // Rollback and then redirect
		    // back to form with errors
		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e)
		{
		    DB::rollback();
		    throw $e;
		}
		DB::commit();
		
    	return \Redirect::to('login');
		// return redirect()->route('charities.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$charity = Charity::findOrFail($id);


		return view('charities.show', compact('charity'));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$charity = Charity::findOrFail($id);
		$governorates=Governorate::all();

		$docs = $charity->charityDocument;
		$d1 = $docs[0];
		$d2 = $docs[1];

		// {
			// var_dump($d->doc) or die;
		// }
		return view('charities.edit', compact('charity','governorates','d2','d1'));
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
		$charity = Charity::findOrFail($id);

		
        $charity->user->name= $request->input("name");
        $charity->user->email = $request->input("email");
        $charity->user->phone = $request->input("phone");
        $charity->taxnum = $request->input("taxnum");
        $charity->credit = $request->input("credit");

        $charity->charityAddress->governorate_id=$request->input("governorate_id");

        $charity->charityAddress->city_id= $request->input("city_id");

        $charity->charityAddress->address= $request->input("address");

        $charity->publishdate = $request->input("publishdate");

        // var_dump($request->hasFile('image')) or die;
        $docs = $charity->charityDocument;
        	
		if ($request->hasFile('image1')) {
	        $file = array('image1' =>\Input::file('image1'));
	        $destinationPath = 'img/'; // upload path
	        $extension = \Input::file('image1')->getClientOriginalExtension(); 
	        $fileName = rand(11111,99999).'.'.$extension; // renaming image1
	        \Input::file('image1')->move($destinationPath, $fileName);

        	$docs[0]->doc=$fileName;
        	$docs[0]->charity_id=$charity->id;
        	$docs[0]->save();
	    	
	    }

	    if ($request->hasFile('image2')) {
	        $file = array('image2' =>\Input::file('image2'));
	        $destinationPath = 'img/'; // upload path
	        $extension = \Input::file('image2')->getClientOriginalExtension(); 
	        $fileName = rand(11111,99999).'.'.$extension; // renaming image2
	        \Input::file('image2')->move($destinationPath, $fileName);

        	$docs[1]->doc=$fileName;
        	$docs[1]->charity_id=$charity->id;
        	$docs[1]->save();
	    	
	    }


		$charity->save();

		return redirect()->route('charities.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$charity = Charity::findOrFail($id);
		$charity->delete();

		return redirect()->route('charities.index')->with('message', 'Item deleted successfully.');
	}

	public function check(Request $request)
	{
		if ($request->input("action")=="name")
		{
			$name=User::where('name','=',$request->input("username"))->get();
			return $name;
			
		}
		if ($request->input("action")=="email")
		{
			$email=User::where('email','=',$request->input("email"))->get();
			return $email;
			
		}
	}

	// 2 functions Approve and Disapprove Charity by admin --> by shrouk
	public function approve($charity_id)
	{
		$charity = Charity::findOrFail($charity_id);
		$Ch_user = User::findOrFail($charity->user->id);

		$Ch_user->approved = 1;
		$Ch_user->why = "";
		$Ch_user->save();
		return redirect()->route('charities.show', $charity_id);
	}

	public function disapprove($charity_id ,Request $request)
	{
		$charity = Charity::findOrFail($charity_id);
		$Ch_user = User::findOrFail($charity->user->id);
		$Ch_user->approved = 0;
		$Ch_user->why = $request->input('why');
		$Ch_user->save();
		return redirect()->route('charities.show', $charity_id);
	}
	//end of 2 functions --> by shrouk

}
