<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\AdditionalInfo;
use Illuminate\Http\Request;

class AdditionalInfoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$additional_infos = AdditionalInfo::orderBy('id', 'desc')->paginate(10);

		return view('additional_infos.index', compact('additional_infos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('additional_infos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$additional_info = new AdditionalInfo();

		$additional_info->firsttime = $request->input("firsttime");
        $additional_info->nexttime = $request->input("nexttime");
        $additional_info->ramainingtime = $request->input("ramainingtime");

		$additional_info->save();

		return redirect()->route('additional_infos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$additional_info = AdditionalInfo::findOrFail($id);

		return view('additional_infos.show', compact('additional_info'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$additional_info = AdditionalInfo::findOrFail($id);

		return view('additional_infos.edit', compact('additional_info'));
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
		$additional_info = AdditionalInfo::findOrFail($id);

		$additional_info->firsttime = $request->input("firsttime");
        $additional_info->nexttime = $request->input("nexttime");
        $additional_info->ramainingtime = $request->input("ramainingtime");

		$additional_info->save();

		return redirect()->route('additional_infos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$additional_info = AdditionalInfo::findOrFail($id);
		$additional_info->delete();

		return redirect()->route('additional_infos.index')->with('message', 'Item deleted successfully.');
	}

}
