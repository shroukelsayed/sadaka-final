<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;
use App\Compaign;
use Illuminate\Http\Request;

class CompaignController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$compaigns = Compaign::orderBy('id', 'desc')->paginate(10);

		return view('compaigns.index', compact('compaigns'));
	}
	public function comps()
	{
		$comps = Compaign::orderBy('id', 'desc')->paginate(10);

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
		$city=City::all();
		return view('compaigns.create' , compact('governrates','city'));
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
        $compaign->governorate_id = $request->input("governrate");
        $compaign->city_id = $request->input("city");
        // $compaign->governorate_id=1;
        // $compaign->city_id=1;
        $compaign->owner=1;

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

		return view('compaigns.show', compact('compaign'));
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
		$city=City::all();	

		return view('compaigns.edit', compact('compaign','governrates','city'));
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
        $compaign->budget = $request->input("budget");
        $compaign->description = $request->input("description");

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
