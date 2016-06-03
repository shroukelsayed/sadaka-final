<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Person;
use App\PersonInfo;
use App\DonationType;
use App\IntervalType;
use App\Governorate;
use App\City;
use Carbon\Carbon;
use App\PersonStatus;


use App\Other;
use Illuminate\Http\Request;

class OtherController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$others = Other::orderBy('id', 'desc')->paginate(10);

		return view('others.index', compact('others'));
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

		return view('others.create',compact('interval_types','governorates','cities'));
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

		//second stage:
		//creating Person Object ...
		$person = new Person();
		$person->user_id = 1;  // Getting User from Session ..
		$person->person_info_id = $person_info->id;
		$person->publishat = Carbon::now();

		//third stage:
		//setting DonationType Object ...
		$person->donation_type_id = 1; //  Donation Type = Other ..

		//fourth stage:
		//setting IntervalType Object ...
		$person->interval_type_id = $request->interval_type_id;

		//fifth stage:
		//setting PersonStatus Object ...
		$person->person_status_id = 1; // Default Waiting Status of new case .. 
		$person->save();

		// Sixth stage:
		// Creating Donation Object ...
		//  Donation Type = Other .. Other must be stored in DB  with id = 4

		$other = new Other();
		$other->description = $request->input("description");
		$other->person_id = $person->id;
		$other->save();

		return redirect()->route('others.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$other = Other::findOrFail($id);

		return view('others.show', compact('other'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$other = Other::findOrFail($id);

		$interval_types = IntervalType::all();
		$governorates = Governorate::all();
		$cities = City::all();
		$status = PersonStatus::all();

		return view('others.edit', compact('other','interval_types','governorates','cities','status'));
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
		$other = Other::findOrFail($id);
		$person = Person::findOrFail($other->person_id);
		$person_info = PersonInfo::findOrFail($person->id);

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
		
		$other->description = $request->input("description");

		$person->person_status_id = 1;
		

		// Third Stage:
		// Saving Case object ..
		$person_info->save();
		$person->save();
		$other->save();

		return redirect()->route('others.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$other = Other::findOrFail($id);
		$other->delete();

		return redirect()->route('others.index')->with('message', 'Item deleted successfully.');
	}

}
