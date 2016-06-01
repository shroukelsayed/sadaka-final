<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Other;
use Illuminate\Http\Request;

class OtherController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$others = Other::orderBy('id', 'desc')->paginate(10);

		return view('others.index', compact('others'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('others.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$other = new Other();

		$other->description = $request->input("description");

		$other->save();

		return redirect()->route('others.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$other = Other::findOrFail($id);

		return view('others.show', compact('other'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$other = Other::findOrFail($id);

		return view('others.edit', compact('other'));
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
		$other = Other::findOrFail($id);

		$other->description = $request->input("description");

		$other->save();

		return redirect()->route('others.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$other = Other::findOrFail($id);
		$other->delete();

		return redirect()->route('others.index')->with('message', 'Item deleted successfully.');
	}

}
