<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PersonStatus;
use Illuminate\Http\Request;

class PersonStatusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$person_statuses = PersonStatus::orderBy('id', 'desc')->paginate(10);

		return view('person_statuses.index', compact('person_statuses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('person_statuses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$person_status = new PersonStatus();

		$person_status->type = $request->input("type");

		$person_status->save();

		return redirect()->route('person_statuses.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$person_status = PersonStatus::findOrFail($id);

		return view('person_statuses.show', compact('person_status'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$person_status = PersonStatus::findOrFail($id);

		return view('person_statuses.edit', compact('person_status'));
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
		$person_status = PersonStatus::findOrFail($id);

		$person_status->type = $request->input("type");

		$person_status->save();

		return redirect()->route('person_statuses.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$person_status = PersonStatus::findOrFail($id);
		$person_status->delete();

		return redirect()->route('person_statuses.index')->with('message', 'Item deleted successfully.');
	}

}
