<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Governorate;
use App\City;

use App\PersonInfo;
use Illuminate\Http\Request;

class PersonInfoController extends Controller {

	public function __construct()
	{
	    $this->middleware('auth', ['except' => ['index','cases']]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$person_infos = PersonInfo::orderBy('id', 'desc')->paginate(10);

		return view('person_infos.index', compact('person_infos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('person_infos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$person_info = new PersonInfo();

		$person_info->name = $request->input("name");
        $person_info->address = $request->input("address");
        $person_info->birthDate = $request->input("birthdate");
        $person_info->gender = $request->input("gender");
        $person_info->maritalstatus = $request->input("maritalstatus");
        $person_info->phone = $request->input("phone");
        $person_info->city_id = 1;
        $person_info->governorate_id = 1;

		$person_info->save();

		return redirect()->route('person_infos.index')->with('message', 'Item created successfully.');
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

		return view('person_infos.show', compact('person_info'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$person_info = PersonInfo::findOrFail($id);
		$governorates = Governorate::all();

		return view('person_infos.edit', compact('person_info','governorates'));
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
		$person_info = PersonInfo::findOrFail($id);

		$person_info->name = $request->input("name");
        $person_info->address = $request->input("address");
        $person_info->birthDate = $request->input("birthdate");
        $person_info->gender = $request->input("gender");
        $person_info->maritalstatus = $request->input("maritalstatus");
        $person_info->city_id = $request->input("city_id");
        $person_info->governorate_id = $request->input("governorate_id");
        $person_info->phone = $request->input("phone");

		$person_info->save();

		return redirect()->route('person_infos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$person_info = PersonInfo::findOrFail($id);
		$person_info->delete();

		return redirect()->route('person_infos.index')->with('message', 'Item deleted successfully.');
	}
}
