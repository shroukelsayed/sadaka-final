<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Charity;
use App\DonationType;
use App\Person;
use App\PersonInfo;
use Illuminate\Http\Request;

class CharityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $charities = Charity::orderBy('id', 'desc')->paginate(10);
		$personinfo= PersonInfo::find('1');
		// var_dump($personinfo->people);die;
		$people=$personinfo->people;
		// var_dump($people);die;
		foreach ($people as $p) {
			var_dump($p->donationType);die;	
		}
		
		echo"<pre>";var_dump($people->donationType()->type);
		// $types=DonationType::all();
		return view('charities.index', compact('personinfo','people'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('charities.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$charity = new Charity();

		$charity->taxnum = $request->input("taxnum");
        $charity->publishdate = $request->input("publishdate");
        $charity->user_id = 2;
		$charity->save();

		return redirect()->route('charities.index')->with('message', 'Item created successfully.');
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

		return view('charities.edit', compact('charity'));
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

		$charity->taxnum = $request->input("taxnum");
        $charity->publishdate = $request->input("publishdate");

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

}
