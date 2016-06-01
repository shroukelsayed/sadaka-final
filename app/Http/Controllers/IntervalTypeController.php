<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\IntervalType;
use Illuminate\Http\Request;

class IntervalTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$interval_types = IntervalType::orderBy('id', 'desc')->paginate(10);

		return view('interval_types.index', compact('interval_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('interval_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$interval_type = new IntervalType();

		$interval_type->type = $request->input("type");

		$interval_type->save();

		return redirect()->route('interval_types.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$interval_type = IntervalType::findOrFail($id);

		return view('interval_types.show', compact('interval_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$interval_type = IntervalType::findOrFail($id);

		return view('interval_types.edit', compact('interval_type'));
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
		$interval_type = IntervalType::findOrFail($id);

		$interval_type->type = $request->input("type");

		$interval_type->save();

		return redirect()->route('interval_types.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$interval_type = IntervalType::findOrFail($id);
		$interval_type->delete();

		return redirect()->route('interval_types.index')->with('message', 'Item deleted successfully.');
	}

}
