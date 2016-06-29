<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\UserInfo;
use App\User;
use App\City;
use App\Governorate;
use Illuminate\Http\Request;

class UserInfoController extends Controller {

	public function __construct()
	{
		$this->middleware('auth',['except' =>[ 'show','create','store','check']]);
		$this->middleware('admin',['only' =>[ 'index','approve','disapprove']]);
	    
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user_infos = array();	
		$u_infos = UserInfo::orderBy('id', 'desc')->paginate(10);
		foreach ($u_infos as $user) {
			if($user->user->user_type_id == 3)
			{
				array_push($user_infos, $user);
			}
		}

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
			
			'name' =>'required',
			'email' =>'required',
			'firstName'=>'required',
			'lastName'=>'required',
			'password' => 'required',
			'confirm_password' => 'required',
			'phone'    => 'required',
			'nationalid'=>'required',
			'gender' => 'in:male,female',
			]);
		DB::beginTransaction();

		try {
			$user= new User();
	        $user->name = $request->input('name');
	        $user->email = $request->input('email');
	        $user->password = bcrypt($request->input('password'));
	        $user->phone=$request->input('phone');

	        //determine user type (Donator or Benefactor) while register to system --> by shrouk
	        if ($type == 'Donator'){
				$user->user_type_id = 4; 
				$user->approved = 1;	
			}
			else{
				$user->user_type_id = 3; 
				$user->approved = 0;
			}
			//end of my code --> by shrouk

			$user->save();
		} catch(ValidationException $e)
		{
		    // Rollback and then redirect
		    // back to form with errors
		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e)
		{
		    DB::rollback();
		    throw $e;
		}
		
		try{
			
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
	     	
	     } catch(ValidationException $e)
		{
		    // Rollback and then redirect
		    // back to form with errors
		    DB::rollback();
		    return Redirect::to('/form')
		        ->withErrors( $e->getErrors() )
		        ->withInput();
		} catch(\Exception $e)
		{
		    DB::rollback();
		    throw $e;
		}
		
		DB::commit();

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
		$user= User::findOrFail($user_info->user_id);
		$city= City::findOrFail($user_info->city_id);
		$gov= Governorate::findOrFail($user_info->governorate_id);
		if(Auth::user()->user_type_id == 4){
            
            return view('user_infos.profile',  compact('gov','city','user','user_info'));
        }
        else{
			return view('user_infos.show', compact('gov','city','user','user_info'));
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request, $id)
	{
		
		$governorates=Governorate::all();
		$user_info = UserInfo::findOrFail($id);
		$user= User::findOrFail($user_info->user_id);
		$city= City::findOrFail($user_info->city_id);
		$gov= Governorate::findOrFail($user_info->governorate_id);
		if(Auth::guest() || Auth::user()->user_type_id == 4){
            
            return view('user_infos.editprofile',  compact('gov','city','user','user_info','governorates'));
        }
        else{
			return view('user_infos.edit', compact('gov','city','user','user_info','governorates'));
		}
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
    	$city->name=$request->input("city_id");
    	$gov->name=$request->input("governorate_id");
        $user->email=$request->input("email");;
        $user_info->birthdate = $request->input("birthdate");
        $user->phone = $request->input("phone");
        $user->name = $request->input("name");
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
		if ($request->input("action")=="name")
		{
			$name=User::where('name','=',$request->input("username"))->get();
			return $name;
			
		}
		if ($request->input("action")=="email")
		{
			$email=User::where('email','=',$request->input("email"))->get();
			return $email;
			
		}
		if ($request->input("action")=="nationalid")
		{
			$nationalid=UserInfo::where('nationalid','=',$request->input("nationalid"))->get();
			return $nationalid;
			
		}
	}

	// 2 functions Approve and Disapprove Benefactor by admin --> by shrouk
	public function approve($user_id)
	{
		$user = User::findOrFail($user_id);
		$user->approved = 1;
		$user->why = "";
		$user->save();
		return redirect()->route('user_infos.show', $user->userInfo->id);
	}

	public function disapprove($user_id ,Request $request)
	{
		$user = User::findOrFail($user_id);
		$user->approved = 0;
		$user->why = $request->input('why');
		$user->save();
		return redirect()->route('user_infos.show', $user->userInfo->id);
	}

	public function changePassword($userid){
		$id = $userid;
		// $user = User::findOrFail(Auth::user()->id);
		// var_dump($user->password);die;
		return view('user_infos.changePassword', compact('id'));	
	}

	public function change(Request $request){
		$user = User::findOrFail(Auth::user()->id);
		// var_dump($user->password);

		var_dump(bcrypt($user->password) == bcrypt($request->input('oldpassword'))); die;

		if ($user->password == $request->input('oldpassword')){

			$user->password = $request->input('password');
			return Redirect::to('/login');
		}
		else{
			return view('welcome');
		}
	}
	//end of 2 functions --> by shrouk
	
}
