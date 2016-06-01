<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blood;
use Illuminate\Http\Request;

class BloodController extends Controller {

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
		return view('bloods.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$blood = new Blood();

		$blood->bloodtype = $request->input("bloodtype");
        $blood->amount = $request->input("amount");
        $blood->hospital = $request->input("hospital");
        $blood->address = $request->input("address");

		$blood->save();

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

		return view('bloods.edit', compact('blood'));
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
		$blood = Blood::findOrFail($id);

		$blood->bloodtype = $request->input("bloodtype");
        $blood->amount = $request->input("amount");
        $blood->hospital = $request->input("hospital");
        $blood->address = $request->input("address");

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
