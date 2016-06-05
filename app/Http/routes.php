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

use App\City;

Route::get('/', function () {
    return view('welcome');
});


// use App\City;
 
// Route::get('/compaigns/create/ajax-state',function()
// {
//     $state_id = Input::get('governorate_id');
//     $subcategories = City::where('state_id','=',$state_id)->get();
//     return $subcategories;
 
// });
Route::auth();



Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

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
Route::resource("interval_types","IntervalTypeController");
Route::resource("person_statuses","PersonStatusController"); 
Route::resource("donation_types","DonationTypeController");
Route::resource("user_types","UserTypeController");
Route::resource("compaign_donate_types","CompaignDonateTypeController");
Route::resource("additional_infos","AdditionalInfoController"); 
Route::resource("charity_documents","CharityDocumentController");
Route::resource("charity_addresses","CharityAddressController");
Route::resource("cities","CityController");
Route::resource("governorates","GovernorateController");
Route::resource("money","MoneyController");
Route::resource("userpeople","UserpersonController");
Route::resource("usercompaign","UserCompaignController");
Route::get('/cases', 'PersonController@cases');
Route::get('/comp', 'CompaignController@comps');
// Route::get('/{locale}', function ($locale) {
// 	App::setLocale($locale);
//     return view('welcome');
// });

// Route::get('ajax-subcat', function(){

// 	$cat_id = Input::get('cat_id');
//   	$cities = City::where('governorate_id', '=', $cat_id)->get();
//   	return Response::json($cities);
// });
