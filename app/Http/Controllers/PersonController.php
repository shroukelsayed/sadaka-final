<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use Validator;
use Input;
use Carbon\Carbon;

use App\Person;
use App\PersonInfo;
use App\DonationType;
use App\IntervalType;
use App\Money;
use App\Medicine;
use App\Other;
use App\Blood;
use App\Governorate;
use App\City;
use App\Interval;
use App\PersonDocument;
use App\PersonStatus;

use Illuminate\Http\Request;

class PersonController extends Controller {

	public function __construct()
	{
	    $this->middleware('auth', ['except' => ['cases','allCasesByCityName','allCasesByStatusName']]);
	    $this->middleware('role',['except' => ['cases','allCasesByCityName','allCasesByStatusName']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	$personinfo = Person::where('person_status_id','!=','3')->where('user_id','=',Auth::user()->id)->get();
		
        $cities = DB::table('cities')->select('name')->get();
        $statuses = DB::table('person_statuses')->select('type')->get();
		return view('people.index', compact('personinfo','statuses','cities'));
	}
	
	public function cases()
	{
		$people = Person::where('person_status_id','!=','3')->limit(8)->get();

		return view('people.case', compact('people'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// rendering Case creation form --> by shrouk
		$donate_types = DonationType::all();
		$interval_types = IntervalType::all();
		$governorates = Governorate::all();
		$cities = City::all();
		
		return view('people.create',compact('donate_types','interval_types','governorates','cities'));
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
			if($request->input("checked_person")){
				$person_info = PersonInfo::findOrFail($request->input("checked_person"));
			}else{
				$person_info = new PersonInfo();
				$person_info->nationalid = $request->input("national_id");
				$person_info->name = $request->input("name");
		        $person_info->address = $request->input("address");
		        $person_info->birthDate = $request->input("birthdate");
		        $person_info->gender = $request->input("gender");
		        $person_info->maritalstatus = $request->input("maritalstatus");
		        $person_info->phone = $request->input("phone");
		        $person_info->city_id = $request->city_id;
		        $person_info->governorate_id = $request->governorate_id;
				$person_info->save();
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

		try{
			//second stage:
			//creating Person Object ...
			$person = new Person();
			$person->user_id = Auth::user()->id;
			$person->person_info_id = $person_info->id;
			$person->title = $request->input("title");
			$person->desc = $request->input("casedesc");
			$person->publishat = Carbon::now();

			// third stage:
			//setting IntervalType Object ...
			$person->interval_type_id = $request->interval_type_id;

			//fourth stage:
			//setting PersonStatus Object ...
			$person->person_status_id = 1;

			//fifth stage:
			//setting DonationType Object ...
			$person->donation_type_id = $request->donation_type_id;

			$person->save();
			if($person->donation_type_id == 1){
				try{
					// fifth stage:
					// Creating Donation Object ...
					//  Donation Type = Blood .. Blood must be stored in DB  with id = 1
					$blood = new Blood();

					$blood->bloodtype = $request->input("bloodtype");
			        $blood->amount = $request->input("amount");
			        $blood->hospital = $request->input("hospital");
			        $blood->address = $request->input("address");
			        $blood->end_date = $request->input("end_date");
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
			}
			elseif ($person->donation_type_id == 2) {
				try{
					//fifth stage:
					//creating Donation Object ...
					//  Donation Type = Money .. Money must be stored in DB  with id = 2
					$money = new Money();
					$money->person_id = $person->id;
					$money->amount = $request->input("amount");
					$money->save();
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
			}
			elseif ($person->donation_type_id == 3) {
				try{
					// fifth stage:
					// Creating Donation Object ...
					//  Donation Type = Medicine .. Medicine must be stored in DB  with id = 3

					$medicine = new Medicine();
					$medicine->name = $request->input("medicine_name");
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
			}
			else{
				try{
					// fifth stage:
					// Creating Donation Object ...
					//  Donation Type = Other .. Other must be stored in DB  with id = 4

					$other = new Other();
					$other->description = $request->input("description");
					$other->person_id = $person->id;
					$other->save();
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

		// sixth stage:
		// Creating Interval Object ...
		//check if donation is for one time or periodic ...
		if($person->interval_type_id == 2 or $person->interval_type_id == 3 or $person->interval_type_id == 4){
			try{
				$interval = new Interval();
				$interval->numtimes = $request->input("numtimes");
				$interval->person_id = $person->id;
				$interval->save();
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
		}

		try{
			// Seventh stage:
			// Creating Case Docs ...

	        $files = Input::file('case_doc');
		    // Making counting of uploaded images
		    $file_count = count($files);
		    // start count how many uploaded
		    $uploadcount = 0;

		    $descs = $request->desc;
		    // var_dump($request->desc);die;

		    // preparing upload path ...
	        if($person->donation_type_id == 1){
	        	$destinationPath = 'Case/PersonDocument/blood'; 
	        }
	        elseif ($person->donation_type_id == 2){
	        	$destinationPath = 'Case/PersonDocument/money'; 
	        }
	        elseif ($person->donation_type_id == 3){
	        	$destinationPath = 'Case/PersonDocument/medicine'; 
	        }
	        else{
	        	$destinationPath = 'Case/PersonDocument/other'; 
	        }

	        // creating num of objs = files num 
		    foreach($files as $file) {
		    	
			      $rules = array('file' => 'required'); 
			      $validator = Validator::make(array('file'=> $file), $rules);
			      if($validator->passes()){

			        $filename = $file->getClientOriginalName();
			        $upload_success = $file->move($destinationPath, $filename);
			        $uploadcount ++;

			        $doc = new PersonDocument();
		    		$doc->document=$filename;
		    		foreach($descs as $desc) {
		    			$doc->desc = $desc;
		    		}
		    		$doc->person_id=$person->id;
		    		$doc->save();

			      
			    }
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
			
		// If we reach here, then
		// data is valid and working.
		// Commit the queries!
		DB::commit();
		
		return redirect()->route('people.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$person_info = PersonInfo::findOrFail($id);

		return view('people.show', compact('person_info'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// rendering Update form of Case Data --> by shrouk

		$person = Person::findOrFail($id);
		$donate_types = DonationType::all();
		$interval_types = IntervalType::all();
		$governorates = Governorate::all();
		$cities = City::all();
		return view('people.edit', compact('person','donate_types','interval_types','governorates','cities'));
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
		// Updating Case Data --> by shrouk

		$person = Person::findOrFail($id);
		$person_info = PersonInfo::findOrFail($person->id);

		$person_info->name = $request->input("name");
        $person_info->address = $request->input("address");
        $person_info->birthDate = $request->input("birthdate");
        $person_info->gender = $request->input("gender");
        $person_info->maritalstatus = $request->input("maritalstatus");
        $person_info->phone = $request->input("phone");
        $person_info->city_id = 1;
        $person_info->governorate_id = 1;
		$person_info->save();

		//second stage:
		//setting PersonStatus Object ...
		$person->person_status_id = 1;
		$person->save();
		return redirect()->route('people.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$person = Person::findOrFail($id);
		$person->delete();

		return redirect()->route('people.index')->with('message', 'Item deleted successfully.');
	}

	// function check for existing person in system --> by shrouk
	public function check(Request $request)
	{
		if ($request->input("action")=="name")
		{	
			// var_dump($request->input("action"));die;
			$name=PersonInfo::where('name','=',$request->input("name"))->get();
			// var_dump($name); die;
			return $name;
		}
	}

	// function seacrh for existing person in system to add new case for him --> by shrouk
	public function search(Request $request)
	{
		if ($request->input("action")=="person_name")
		{	
			$name=PersonInfo::where('nationalid','LIKE', '%' . $request->input("person_name"). '%')->orWhere('name','LIKE', '%' . $request->input("person_name"). '%')->get();
	
			return $name;
		}
	}

	public function periodicCases()
	{
		$personinfo = Person::where('interval_type_id','!=','1')->get();
		// echo "<pre>";
		// var_dump($cases);die;
		return view('people.periodicCases',compact('personinfo'));
	}

	public function allCasesByCityName($city)
	{
		$city_name = City::where('name',$city)->first();
		
		$personinfo = PersonInfo::where('city_id','=',$city_name->id)->get();
        $cities = DB::table('cities')->select('name')->get();
        foreach ($personinfo as $p) {
        	foreach ($p->people as $k) {
        		foreach ($k->personDocs as $doc) {
        			// var_dump($d);die;
        		}	
        	}
        }
        
        if(Auth::guest() || Auth::user()->user_type_id == 4){
        	return view('people.casesByCityName',compact('personinfo','cities','doc'));
        }else{
			return view('people.allCasesByCityName',compact('personinfo','cities'));	
        }	
	}

	public function allCasesByStatusName($status)
	{
		$status_name = PersonStatus::where('type',$status)->first();
		
		$personinfo = Person::where('person_status_id','=',$status_name->id)->get();

        $statuses = DB::table('person_statuses')->select('type')->get();
        
		return view('people.allCasesByStatusName',compact('personinfo','statuses'));	
        	
	}

}
