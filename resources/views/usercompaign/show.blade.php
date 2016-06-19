@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
   
    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
  
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <fieldset style="border: 2px solid lightgray;padding: 20px;margin-bottom: 20px;">
                  <legend>Donator Information</legend>
                <div class="row">
                  <div class="col-md-6">
                  <div class="row">
                      <div class="col-md-5">
                        <label for="name-field"> Name</label>
                      </div>
                      <div class="col-md-7">
                        {{ $person_info->user->name }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="address-field"> National ID</label>
                      </div>
                      <div class="col-md-7">
                        {{ $person_info->user->userInfo->nationalid }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="birthdate-field"> BirthDate</label>
                      </div>
                      <div class="col-md-7">
                        {{ $person_info->user->userInfo->birthdate }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="governorate_id_field"> Address </label>
                      </div>
                      <div class="col-md-7">
                        {{$person_info->user->userInfo->address}}
                      </div>       
                    </div>
                  </div>
                  <div class="col-md-6">
                  	<div class="row">
                      <div class="col-md-5">
                        <label for="governorate_id_field"> Governorate Name </label>
                      </div>
                      <div class="col-md-7">
                        {{$person_info->user->userInfo->governorate->name}}
                      </div>       
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="city_id_field"> City Name </label>
                      </div>
                      <div class="col-md-7">
                        {{$person_info->user->userInfo->city->name}}
                      </div>  
                      </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="gender-field"> Gender</label>
                      </div>
                      <div class="col-md-7">
                        {{ $person_info->user->userInfo->gender }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="phone-field"> Phone</label>
                      </div>
                      <div class="col-md-7">
                        {{ $person_info->user->phone }}
                      </div>
                    </div>
                    </div>
                    </div>
                 </fieldset>
                <fieldset style="border: 2px solid lightgray;padding: 20px;margin-bottom: 20px;">
                <legend>Compaign Information</legend>
                	<div class="row">
	                  <div class="col-md-6">
	                  <div class="row">
	                      <div class="col-md-5">
	                        <label for="name-field"> Title</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ $person_info->compaign->title }}
	                      </div>
	                    </div> 
	                   </div>
	                </div>
	                <div class="row">
	                  <div class="col-md-6">
	                  <div class="row">
	                      <div class="col-md-5">
	                        <label for="name-field"> Budget</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ $person_info->compaign->budget }}
	                      </div>
	                    </div> 
	                   </div>
	                </div>
	                <div class="row">
	                  <div class="col-md-6">
	                  <div class="row">
	                      <div class="col-md-5">
	                        <label for="name-field"> Description</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ $person_info->compaign->description }}
	                      </div>
	                    </div> 
	                   </div>
	                </div>
	                <div class="row">
	                  <div class="col-md-6">
	                  <div class="row">
	                      <div class="col-md-5">
	                        <label for="name-field"> Start date</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ date('F d, Y', strtotime($person_info->compaign->startdate)) }}
	                      </div>
	                    </div> 
	                   </div>
	                </div>
	                <div class="row">
	                  <div class="col-md-6">
	                  <div class="row">
	                      <div class="col-md-5">
	                        <label for="name-field"> End Date</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ date('F d, Y', strtotime($person_info->compaign->enddate)) }}
	                      </div>
	                    </div> 
	                   </div>
	                </div>
                    <div class="row">
                        <div class="col-md-5">
                        	<label for="case_doc_field"> Image :</label>
                        </div>
                        <div class="col-md-7">
                        <img style="margin-right:45px; width: 200px; height: 200px;" src="{{ asset("compagin/$image")}}" alt="Compaign Image" />
                        </div>
                    </div>
                </fieldset>
                
        </div>
    </div>
@endsection

