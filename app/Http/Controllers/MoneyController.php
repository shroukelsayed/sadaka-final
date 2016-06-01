<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Money;
use Illuminate\Http\Request;

class MoneyController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$money = Money::orderBy('id', 'desc')->paginate(10);

		return view('money.index', compact('money'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('money.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$money = new Money();

		$money->amount = $request->input("amount");

		$money->save();

		return redirect()->route('money.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$money = Money::findOrFail($id);

		return view('money.show', compact('money'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$money = Money::findOrFail($id);

		return view('money.edit', compact('money'));
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
		$money = Money::findOrFail($id);

		$money->amount = $request->input("amount");

		$money->save();

		return redirect()->route('money.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$money = Money::findOrFail($id);
		$money->delete();

		return redirect()->route('money.index')->with('message', 'Item deleted successfully.');
	}

}
