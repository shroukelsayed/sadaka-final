<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
use Illuminate\Http\Request;

class PersonController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$people = Person::orderBy('id', 'desc')->paginate(10);

		return view('people.index', compact('people'));
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
		$person->user_id = 1;
		$person->person_info_id = $person_info->id;
		$person->publishat = $request->input("publishat");

		//third stage:
		//setting DonationType Object ...
		$person->donation_type_id = $request->donation_type_id;

		//fourth stage:
		//setting IntervalType Object ...
		$person->interval_type_id = $request->interval_type_id;

		//fifth stage:
		//setting PersonStatus Object ...
		$person->person_status_id = 1;
		$person->save();

		//sixth stage:
		//creating Donation Object ...
		// $donationType = $person->donationType->type;
		// consider that our simple Donation Case is Money .. 
		$money = new Money();
		$money->person_id = $person->id;
		$money->amount = $request->input("amount");
		$money->save();

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
		$person = Person::findOrFail($id);

		return view('people.show', compact('person'));
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

}
