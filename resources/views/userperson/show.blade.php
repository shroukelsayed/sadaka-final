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
                  @if($person_info->checked === 0)
                  <a style="margin-top: -30px;" class="btn btn-primary pull-right" role="group" href="{{ URL::to('approveDonation', $person_info->id) }}"><i class="glyphicon glyphicon-edit"></i> Approve Donation</a>
                  @endif
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
                <legend>Case Information</legend>
                <!-- @if($person_info->person->donation_type_id === 1)
                	<a style="margin-top: -30px;" class="btn btn-primary pull-right" role="group" href="{{ route('bloods.edit', $person_info->person->blood->id) }}"><i class="glyphicon glyphicon-edit"></i> Update</a>
                @elseif($person_info->person->donation_type_id === 2)
                	<a style="margin-top: -30px;" class="btn btn-primary pull-right" role="group" href="{{ route('money.edit', $person_info->person->money->id) }}"><i class="glyphicon glyphicon-edit"></i> Update</a>
                @elseif($person_info->person->donation_type_id === 3)
                	<a style="margin-top: -30px;" class="btn btn-primary pull-right" role="group" href="{{ route('medicines.edit', $person_info->person->medicine->id) }}"><i class="glyphicon glyphicon-edit"></i> Update</a>
                @else
                	<a style="margin-top: -30px;" class="btn btn-primary pull-right" role="group" href="{{ route('others.edit', $person_info->person->other->id) }}"><i class="glyphicon glyphicon-edit"></i> Update</a>
                @endif -->
                	<div class="row">
	                  <div class="col-md-6">
	                  <div class="row">
	                      <div class="col-md-5">
	                        <label for="name-field"> Name</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ $person_info->person->personInfo->name }}
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="address-field"> National ID</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ $person_info->person->personInfo->nationalid }}
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="birthdate-field"> BirthDate</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ $person_info->person->personInfo->birthdate }}
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="governorate_id_field"> Address </label>
	                      </div>
	                      <div class="col-md-7">
	                        {{$person_info->person->personInfo->address}}
	                      </div>       
	                    </div>
	                  </div>
	                  <div class="col-md-6">
	                  	<div class="row">
	                      <div class="col-md-5">
	                        <label for="governorate_id_field"> Governorate Name </label>
	                      </div>
	                      <div class="col-md-7">
	                        {{$person_info->person->personInfo->governorate->name}}
	                      </div>       
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="city_id_field"> City Name </label>
	                      </div>
	                      <div class="col-md-7">
	                        {{$person_info->person->personInfo->city->name}}
	                      </div>  
	                      </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="gender-field"> Gender</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ $person_info->person->personInfo->gender }}
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field"> Phone</label>
	                      </div>
	                      <div class="col-md-7">
	                        {{ $person_info->person->personInfo->phone }}
	                      </div>
	                    </div>
	                    </div>
	                    </div>

	                    <hr style="border:1px dashed gray;">

	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field"> Title</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->title }}
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field"> Description</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->desc }}
	                      </div>
	                    </div>
	                @if($person_info->person->donation_type_id === 1)
	                	<div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field">Blood Type</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->blood->bloodtype }}
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field">Blood Bags</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->blood->amount }}
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field">End Date</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->blood->enddate }}
	                      </div>
	                    </div>
	                @elseif($person_info->person->donation_type_id === 2)
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field">Amount</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->money->amount }}
	                      </div>
	                    </div>
	                    <div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field">Paid</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->money->paid }}
	                      </div>
	                    </div>
	                @elseif($person_info->person->donation_type_id === 3)
	                	<div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field">Medicine Name</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->medicine->name }}
	                      </div>
	                    </div>
	                	<div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field">Amount</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{$person_info->person->medicine->amount }}
	                      </div>
	                    </div>
	                    
	                @else
	                	<div class="row">
	                      <div class="col-md-5">
	                        <label for="phone-field">Description</label>
	                      </div>
	                      <div class="col-md-7">
	                    	{{ $person_info->person->other->description }}
	                      </div>
	                    </div>
	                @endif

                      @foreach($person_info->person->personDocs as $doc)
                        <div class="row">
                        <div class="col-md-5">
                        <label for="case_doc_field">Document Description :</label>
                        {{$doc->desc}}
                        </div>
                        <div class="col-md-7">
                        @if($person_info->person->donation_type_id === 1)
                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/blood/$doc->document") }}" alt="$doc->document" /></div>

                        @elseif($person_info->person->donation_type_id === 2)
                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/money/$doc->document") }}" alt="$doc->document" /></div>

                        @elseif($person_info->person->donation_type_id === 3)
                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/medicine/$doc->document") }}" alt="$doc->document" /></div>

                        @else
                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/other/$doc->document") }}" alt="$doc->document" /></div>
                        @endif
                      @endforeach
                    </div>
                    </fieldset>
                
        </div>
    </div>
@endsection

