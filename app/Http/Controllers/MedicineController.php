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

use App\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller {

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
		$medicines = Medicine::orderBy('id', 'desc')->paginate(10);

		return view('medicines.index', compact('medicines'));
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

		return view('medicines.create',compact('interval_types','governorates','cities'));
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
			$person->user_id = Auth::user()->id;;  // Getting User from Session ..
			$person->person_info_id = $person_info->id;
			$person->publishat = Carbon::now();

			//third stage:
			//setting DonationType Object ...
			// Donation Type = Medicine .. Medicine must be stored in DB  with id = 3
			$person->donation_type_id = 3; 

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
			//  Donation Type = Medicine .. Medicine must be stored in DB  with id = 3

			$medicine = new Medicine();
			$medicine->name = $request->input("name");
	        $medicine->amount = $request->input("amount");
	        $medicine->person_id = $person->id;
			$medicine->save();
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
	        $destinationPath = 'Case/PersonDocument/medicine'; // upload path
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

		return redirect()->route('medicines.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$medicine = Medicine::findOrFail($id);

		return view('medicines.show', compact('medicine'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$medicine = Medicine::findOrFail($id);

		$interval_types = IntervalType::all();
		$governorates = Governorate::all();
		$cities = City::all();
		$status = PersonStatus::all();
		$docs = $medicine->person->personDocs;

		return view('medicines.edit', compact('medicine','interval_types','governorates','cities','status','docs'));
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
		$medicine = Medicine::findOrFail($id);
		$person = Person::findOrFail($medicine->person_id);
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
		

		$medicine->name = $request->input("name");
        $medicine->amount = $request->input("amount");

        $person->person_status_id = 1;
		
		if ($request->hasFile('case_doc')) {
	        $file = array('case_doc' => \Input::file('case_doc'));
	        $destinationPath = 'Case/PersonDocument/medicine'; // upload path
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
		$medicine->save();

		return redirect()->route('medicines.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$medicine = Medicine::findOrFail($id);
		$medicine->delete();

		return redirect()->route('medicines.index')->with('message', 'Item deleted successfully.');
	}

}
