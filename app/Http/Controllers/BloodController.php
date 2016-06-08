<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use Validator;
use App\Person;
use App\PersonInfo;
use App\DonationType;
use App\IntervalType;
use App\Governorate;
use App\City;
use Carbon\Carbon;
use App\PersonStatus;
use App\PersonDocument;

use App\Blood;
use Illuminate\Http\Request;

class BloodController extends Controller {

	public function __construct()
	{
	    $this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bloods = Blood::orderBy('id', 'desc')->paginate(10);

		return view('bloods.index', compact('bloods'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$interval_types = IntervalType::all();
		$governorates = Governorate::all();
		$cities = City::all();
		// $date = Carbon::now();
		return view('bloods.create',compact('interval_types','governorates','cities'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{

		// Creating Case Data .. --> by shrouk
		// Start transaction!
		DB::beginTransaction();

		try {
			//first stage:
			//creating PersonInfo Object ...
			$person_info = new PersonInfo();
			$person_info->name = $request->input("name");
	        $person_info->address = $request->input("address");
	        $person_info->birthDate = $request->input("birthdate");
	        $person_info->gender = $request->input("gender");
	        $person_info->maritalstatus = $request->input("maritalstatus");
	        $person_info->phone = $request->input("phone");
	        $person_info->city_id = $request->city_id;
	        $person_info->governorate_id = $request->governorate_id;
			$person_info->save();
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
			//second stage:
			//creating Person Object ...
			$person = new Person();
			$person->user_id = Auth::user()->id;  // Getting User from Session ..
			$person->person_info_id = $person_info->id;
			$person->publishat = Carbon::now();

			//third stage:
			//setting DonationType Object ...
			$person->donation_type_id = 1; //  Donation Type = Blood ..

			//fourth stage:
			//setting IntervalType Object ...
			$person->interval_type_id = $request->interval_type_id;

			//fifth stage:
			//setting PersonStatus Object ...
			$person->person_status_id = 1; // Default Waiting Status of new case .. 
			$person->save();
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
			// Sixth stage:
			// Creating Donation Object ...
			//  Donation Type = Blood .. Blood must be stored in DB  with id = 1
			$blood = new Blood();

			$blood->bloodtype = $request->input("bloodtype");
	        $blood->amount = $request->input("amount");
	        $blood->hospital = $request->input("hospital");
	        $blood->address = $request->input("address");
	        $blood->city_id = $request->c_id;
	        $blood->governorate_id = $request->g_id;
	        $blood->person_id = $person->id;
			$blood->save();
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
			// Seventh stage:
			// Creating Case Docs ...
			
	        $file = array('case_doc' => \Input::file('case_doc'));
	        $destinationPath = 'Case/PersonDocument/blood'; // upload path
	        $extension = \Input::file('case_doc')->getClientOriginalExtension(); 
	        $fileName = rand(11111,99999).'.'.$extension; // renaming case_doc
	        \Input::file('case_doc')->move($destinationPath, $fileName);
	    	$doc = new PersonDocument();
    		$doc->document=$fileName;
    		$doc->person_id=$person->id;
    		$doc->save();
    	
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

		// If we reach here, then
		// data is valid and working.
		// Commit the queries!
		DB::commit();
		
		return redirect()->route('bloods.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$blood = Blood::findOrFail($id);

		return view('bloods.show', compact('blood'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$blood = Blood::findOrFail($id);
		$interval_types = IntervalType::all();
		$governorates = Governorate::all();
		$cities = City::all();
		$status = PersonStatus::all();
		$docs = $blood->person->personDocs;

		return view('bloods.edit', compact('blood','interval_types','governorates','cities','status','docs'));
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

		// First Stage:
		// Getting Case with it's all info ..
		$blood = Blood::findOrFail($id);
		$person = Person::findOrFail($blood->person_id);
		$person_info = $person->personInfo;

		// Second Stage:
		// Getting new Data .. 
		$person_info->name = $request->input("name");
        $person_info->address = $request->input("address");
        $person_info->birthDate = $request->input("birthdate");
        $person_info->gender = $request->input("gender");
        $person_info->maritalstatus = $request->input("maritalstatus");
        $person_info->phone = $request->input("phone");
        $person_info->city_id = 1;
        $person_info->governorate_id = 1;
		
		$blood->bloodtype = $request->input("bloodtype");
        $blood->amount = $request->input("amount");
        $blood->hospital = $request->input("hospital");
        $blood->address = $request->input("address");

		$person->person_status_id = 1;

		if ($request->hasFile('case_doc')) {
	        $file = array('case_doc' => \Input::file('case_doc'));
	        $destinationPath = 'Case/PersonDocument/blood'; // upload path
	        $extension = \Input::file('case_doc')->getClientOriginalExtension(); 
	        $fileName = rand(11111,99999).'.'.$extension; // renaming case_doc
	        \Input::file('case_doc')->move($destinationPath, $fileName);
	        $docs = $person->personDocs;
	        foreach ($docs as $personDoc) {
	        	$personDoc->document=$fileName;
	    		$personDoc->save();
	        }	
	    }	

		// Third Stage:
		// Saving Case object ..
		$person_info->save();
		$person->save();
		$blood->save();

		return redirect()->route('bloods.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$blood = Blood::findOrFail($id);
		$blood->delete();

		return redirect()->route('bloods.index')->with('message', 'Item deleted successfully.');
	}

}
