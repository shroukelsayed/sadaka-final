<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UserInfo;
use App\User;
use App\City;
use App\Governorate;
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
	public function create(Request $request)
	{
		$governrate=Governorate::all();
		$city=City::all();
		$type = $request->type;
		// var_dump($type);die;
		return view('user_infos.create',compact('user_infos','governrate','city','type'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$type = $request->input('type');

		
		$this->validate($request,[
			'email' =>'email|unique:users,email',
			'name' =>'required|max:255|unique:users,name',
			'firstName'=>'required|max:50',
			'lastName'=>'required|max:50',
			'password' => 'required|between:6,20',
			'password_confirm' => 'required|same:password',
			'phone'    => 'required|regex:/^\+?[^a-zA-Z]{5,}$/',
			'nationalid'=>'required | numeric',
			'gender' => 'in:male,female',
			]);
		$user= new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone=$request->input('phone');

        if ($type == 'Donator'){
			$user->user_type_id = 4; 	
		}
		else{
			$user->user_type_id = 3; 
		}

		$user->save();
		
		
		$user_info = new UserInfo();
		$user_info->nationalid = $request->input("nationalid");
        $user_info->address = $request->input("address");
        $user_info->firstName=$request->input("firstName");
        $user_info->lastName=$request->input("lastName");
        $user_info->birthdate = $request->input("birthdate");
        $user_info->gender = $request->input("gender");
        $user_info->user_id = $user->id;
        $user_info->city_id=$request->input("city");
        $user_info->governorate_id =$request->input("level");
		$user_info->save();
     	
     	return \Redirect::to('login');
		// return redirect()->route('user_infos.index')->with('message', 'Item created successfully.');
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
		$user= User::findOrFail($id);
		$city= City::findOrFail($id);
		$gov= Governorate::findOrFail($id);
		return view('user_infos.show', compact('gov','city','user','user_info'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		$user_info = UserInfo::findOrFail($id);
		$user= User::findOrFail($id);
		$city= City::findOrFail($id);
		$gov= Governorate::findOrFail($id);
		return view('user_infos.edit', compact('gov','city','user','user_info'));
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
		$user= User::findOrFail($id);
		$city_id=$user_info['city_id'];
		$gov_id=$user_info['governorate_id'];
		$gov= Governorate::findOrFail($gov_id);
		$city= City::findOrFail($city_id);
		$user_info->nationalid = $request->input("nationalid");
        $user_info->address = $request->input("address");
        $user_info->firstName = $request->input("firstName");
        $user_info->lastName = $request->input("lastName");
    	$city->name=$request->input("cityname");
        $user->email=$request->input("email");;
        $user_info->birthdate = $request->input("birthdate");
        $user->phone = $request->input("phone");
        $user->name = $request->input("name1");
		$user_info->save();
		$user->save();
		$city->save();
		$gov->save();

		return redirect()->route('user_infos.show', $user_info->id)->with('message', 'Item updated successfully.');
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
	public function check(Request $request)
	{
		if ($request->input("action")=="name1")
		{
			$name=User::where('name','=',$request->input("username"))->get();
			return $name;
			
		}
		if ($request->input("action")=="email")
		{
			$email=User::where('email','=',$request->input("email"))->get();
			return $email;
			
		}
	}
	
}
