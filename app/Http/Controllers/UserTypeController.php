<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_types = UserType::orderBy('id', 'desc')->paginate(10);

		return view('user_types.index', compact('user_types'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user_types.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user_type = new UserType();

		$user_type->type = $request->input("type");

		$user_type->save();

		return redirect()->route('user_types.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user_type = UserType::findOrFail($id);

		return view('user_types.show', compact('user_type'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user_type = UserType::findOrFail($id);

		return view('user_types.edit', compact('user_type'));
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
		$user_type = UserType::findOrFail($id);

		$user_type->type = $request->input("type");

		$user_type->save();

		return redirect()->route('user_types.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user_type = UserType::findOrFail($id);
		$user_type->delete();

		return redirect()->route('user_types.index')->with('message', 'Item deleted successfully.');
	}

}
