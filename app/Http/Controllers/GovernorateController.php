<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$governorates = Governorate::orderBy('id', 'desc')->paginate(10);

		return view('governorates.index', compact('governorates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('governorates.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$governorate = new Governorate();

		$governorate->name = $request->input("name");

		$governorate->save();

		return redirect()->route('governorates.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$governorate = Governorate::findOrFail($id);

		return view('governorates.show', compact('governorate'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$governorate = Governorate::findOrFail($id);

		return view('governorates.edit', compact('governorate'));
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
		$governorate = Governorate::findOrFail($id);

		$governorate->name = $request->input("name");

		$governorate->save();

		return redirect()->route('governorates.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$governorate = Governorate::findOrFail($id);
		$governorate->delete();

		return redirect()->route('governorates.index')->with('message', 'Item deleted successfully.');
	}

}
