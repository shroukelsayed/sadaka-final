<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Interval;
use Illuminate\Http\Request;

class IntervalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$intervals = Interval::orderBy('id', 'desc')->paginate(10);

		return view('intervals.index', compact('intervals'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('intervals.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$interval = new Interval();

		$interval->numtimes = $request->input("numtimes");

		$interval->save();

		return redirect()->route('intervals.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$interval = Interval::findOrFail($id);

		return view('intervals.show', compact('interval'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$interval = Interval::findOrFail($id);

		return view('intervals.edit', compact('interval'));
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
		$interval = Interval::findOrFail($id);

		$interval->numtimes = $request->input("numtimes");

		$interval->save();

		return redirect()->route('intervals.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$interval = Interval::findOrFail($id);
		$interval->delete();

		return redirect()->route('intervals.index')->with('message', 'Item deleted successfully.');
	}

}
