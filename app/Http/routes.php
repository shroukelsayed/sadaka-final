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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

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
