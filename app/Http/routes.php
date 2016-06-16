 <?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use App\Governorate;

Route::group(['middleware' => ['web']], function () {
    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

    Route::auth();
	Route::get('/','HomeController@index');

	Route::group(['middleware' => ['auth' ,'admin']], function () {
		Route::get('/admin', function () {
	    	return view('welcome');
		});
	});

	Route::group(['middleware' => ['auth' ,'role']], function () {
		
		// routes --> by shrouk 
		
		// end routes --> by shrouk
	});


	Route::post('/people/search','PersonController@search');
	Route::get('approve/{user_id}','UserInfoController@approve');
	Route::post('disapprove/{user_id}','UserInfoController@disapprove');
	Route::get('approveCharity/{charity_id}','CharityController@approve');
	Route::post('disapproveCharity/{charity_id}','CharityController@disapprove');
		

	Route::resource("user_infos","UserInfoController");
	Route::resource("charities","CharityController");
	Route::resource("compaigns","CompaignController");
	Route::resource("people","PersonController");
	Route::resource("person_infos","PersonInfoController"); 
	Route::resource("bloods","BloodController");
	Route::resource("medicines","MedicineController"); 
	Route::resource("others","OtherController");
	Route::resource("person_documents","PersonDocumentController");
	Route::resource("intervals","IntervalController"); 
	
	Route::resource("person_statuses","PersonStatusController"); 
	Route::resource("additional_infos","AdditionalInfoController"); 
	Route::resource("charity_documents","CharityDocumentController");
	Route::resource("charity_addresses","CharityAddressController");
	Route::resource("money","MoneyController");
	Route::resource("userpeople","UserpersonController");
	Route::resource("usercompaign","UserCompaignController");
	Route::get('/cases', 'PersonController@cases');
	Route::get('/comp', 'CompaignController@comps');
	Route::post('/user_infos/create/','UserInfoController@check');
	Route::post('/charities/create','CharityController@check');

	Route::get('/ajax-governrate', function(){
	$governorate_id =Input::get('governorate_id');
	// var_dump($governorate_id);
	$cities = City::where('governorate_id', '=', $governorate_id)->get();
	// $cities=DB::table('cities')->where('governorate_id',$governorate_id);
	// $governrates=Governorate::findOrFail($governorate_id);
	// $cities = $governrates->city();
	return Response::json($cities);
	});

	// routes --> by shrouk
	Route::get('api/dropdown', function(){
	    $input = \Input::get('option');

	    $cities = DB::table('cities')->where('governorate_id',$input);
	   
	    return Response::json($cities->select(array('id','name'))->get());
	});
	Route::post('/people/create','PersonController@check');

	// filtering ...
	Route::get('allCasesByBloodType/{bloodtype}','BloodController@allCasesByBloodType');
	Route::get('allCasesByMedicineName/{name}','MedicineController@allCasesByMedicineName');
	Route::get('periodicCases','PersonController@periodicCases');
	
	// end routes --> by shrouk
});
