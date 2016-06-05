<?php namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Governorate;
use App\City;
use App\Charity;
use App\DonationType;
use App\Person;
use App\PersonInfo;
use Illuminate\Http\Request;
use App\CharityAddress;
use App\CharityDocument;
use Illuminate\Support\Facades\Input;
class CharityController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$personinfo= PersonInfo::all();
		return view('people.index', compact('personinfo'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$governrate=Governorate::all();
		$city=City::all();
		return view('charities.create',compact('charity','governrate','city'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$user= new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone=$request->input('phone');
		$user->save();

		$charity = new Charity();
		$charity->taxnum = $request->input("taxnum");
        $charity->publishdate = $request->input("publishdate");
        $charity->user_id =$user->id;
		$charity->save();

		$charityAddress=new CharityAddress();
		$charityAddress->address=$request->input('address');
		$charityAddress->charity_id=$charity->id;
		$charityAddress->city_id=$request->input('city');
		$charityAddress->governorate_id=$request->input('level');
		
		$charityAddress->save();

		
		if ($request->hasFile('image')) {
        $file = array('image' => Input::file('image'));
        $destinationPath = 'img/'; // upload path
        $extension = Input::file('image')->getClientOriginalExtension(); 
        $fileName = rand(11111,99999).'.'.$extension; // renaming image
        Input::file('image')->move($destinationPath, $fileName);
        $doc = new CharityDocument();
    		$doc->doc=$fileName;
    		$doc->charity_id=$charity->id;
    		$doc->save();
        }
        else
       {
        echo "Please Upload Your Profile Image!";
       }
        if ($request->hasFile('image1')) {
        $file1 = array('image1' => Input::file('image1'));
        $destinationPath = 'img/'; // upload path
        $extension = Input::file('image1')->getClientOriginalExtension(); 
        $fileName1 = rand(11111,99999).'.'.$extension; // renaming image
        Input::file('image1')->move($destinationPath, $fileName1);
    	$doc1 = new CharityDocument();
    		$doc1->doc=$fileName1;
    		$doc1->charity_id=$charity->id;
    		$doc1->save();

    }
    		
    else
    {
        echo "Please Upload Your Profile Image!";
    }

		

		return redirect()->route('charities.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$charity = Charity::findOrFail($id);

		return view('charities.show', compact('charity'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$charity = Charity::findOrFail($id);

		return view('charities.edit', compact('charity'));
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
		$charity = Charity::findOrFail($id);

		$charity->taxnum = $request->input("taxnum");
        $charity->publishdate = $request->input("publishdate");

		$charity->save();

		return redirect()->route('charities.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$charity = Charity::findOrFail($id);
		$charity->delete();

		return redirect()->route('charities.index')->with('message', 'Item deleted successfully.');
	}

}
