<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CompaignDonateType;
use Illuminate\Http\Request;

class CompaignDonateTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$compaign_donate_types = CompaignDonateType::orderBy('id', 'desc')->paginate(10);

		return view('compaign_donate_types.index', compact('compaign_donate_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('compaign_donate_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$compaign_donate_type = new CompaignDonateType();

		$compaign_donate_type->type = $request->input("type");

		$compaign_donate_type->save();

		return redirect()->route('compaign_donate_types.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$compaign_donate_type = CompaignDonateType::findOrFail($id);

		return view('compaign_donate_types.show', compact('compaign_donate_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$compaign_donate_type = CompaignDonateType::findOrFail($id);

		return view('compaign_donate_types.edit', compact('compaign_donate_type'));
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
		$compaign_donate_type = CompaignDonateType::findOrFail($id);

		$compaign_donate_type->type = $request->input("type");

		$compaign_donate_type->save();

		return redirect()->route('compaign_donate_types.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$compaign_donate_type = CompaignDonateType::findOrFail($id);
		$compaign_donate_type->delete();

		return redirect()->route('compaign_donate_types.index')->with('message', 'Item deleted successfully.');
	}

}
