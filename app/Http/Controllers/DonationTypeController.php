<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\DonationType;
use Illuminate\Http\Request;

class DonationTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$donation_types = DonationType::orderBy('id', 'desc')->paginate(10);

		return view('donation_types.index', compact('donation_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('donation_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$donation_type = new DonationType();

		$donation_type->type = $request->input("type");

		$donation_type->save();

		return redirect()->route('donation_types.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$donation_type = DonationType::findOrFail($id);

		return view('donation_types.show', compact('donation_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$donation_type = DonationType::findOrFail($id);

		return view('donation_types.edit', compact('donation_type'));
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
		$donation_type = DonationType::findOrFail($id);

		$donation_type->type = $request->input("type");

		$donation_type->save();

		return redirect()->route('donation_types.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$donation_type = DonationType::findOrFail($id);
		$donation_type->delete();

		return redirect()->route('donation_types.index')->with('message', 'Item deleted successfully.');
	}

}
