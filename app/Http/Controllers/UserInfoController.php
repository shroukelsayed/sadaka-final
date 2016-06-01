<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserInfo;
use Illuminate\Http\Request;

class UserInfoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_infos = UserInfo::orderBy('id', 'desc')->paginate(10);

		return view('user_infos.index', compact('user_infos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('user_infos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user_info = new UserInfo();

		$user_info->nationalid = $request->input("nationalid");
        $user_info->address = $request->input("address");
        $user_info->birthdate = $request->input("birthdate");
        $user_info->gender = $request->input("gender");
        $user_info->user_id = 2;
        $user_info->city_id = 1;
        $user_info->governorate_id = 1;

		$user_info->save();

		return redirect()->route('user_infos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user_info = UserInfo::findOrFail($id);

		return view('user_infos.show', compact('user_info'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user_info = UserInfo::findOrFail($id);

		return view('user_infos.edit', compact('user_info'));
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
		$user_info = UserInfo::findOrFail($id);

		$user_info->nationalid = $request->input("nationalid");
        $user_info->address = $request->input("address");
        $user_info->birthdate = $request->input("birthdate");
        $user_info->gender = $request->input("gender");

		$user_info->save();

		return redirect()->route('user_infos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user_info = UserInfo::findOrFail($id);
		$user_info->delete();

		return redirect()->route('user_infos.index')->with('message', 'Item deleted successfully.');
	}

}
