<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CharityAddress;
use Illuminate\Http\Request;

class CharityAddressController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$charity_addresses = CharityAddress::orderBy('id', 'desc')->paginate(10);

		return view('charity_addresses.index', compact('charity_addresses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('charity_addresses.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$charity_address = new CharityAddress();

		$charity_address->address = $request->input("address");

		$charity_address->save();

		return redirect()->route('charity_addresses.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$charity_address = CharityAddress::findOrFail($id);

		return view('charity_addresses.show', compact('charity_address'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$charity_address = CharityAddress::findOrFail($id);

		return view('charity_addresses.edit', compact('charity_address'));
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
		$charity_address = CharityAddress::findOrFail($id);

		$charity_address->address = $request->input("address");

		$charity_address->save();

		return redirect()->route('charity_addresses.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$charity_address = CharityAddress::findOrFail($id);
		$charity_address->delete();

		return redirect()->route('charity_addresses.index')->with('message', 'Item deleted successfully.');
	}

}
