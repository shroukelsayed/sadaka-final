@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/Admin/form.css">
@endsection
@section('header')

    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> New Case </h1>
    </div>

    <script>
      
      $(document).ready(function () {
        // console.log("hiiiii");
        $("#donation_type_id_field").on("change", function () {
          // console.log("donation_type");
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            // console.log(valueSelected);
            if(valueSelected == 1 ){
              donationDiv=document.getElementById("donationDiv");
              donationDiv.innerHTML= "";

              // Donation Form for Blood ...

              var donationForm ="<div class='form-group @if($errors->has("+bloodtype+")) has-error @endif'><label for='bloodtype-field'>Case Bloodtype</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' id='bloodtype-field' name='bloodtype' class='form-control' value='{{ old("+bloodtype+") }}'/>@if($errors->has("+bloodtype+"))<span class='help-block'>{{ $errors->first("+bloodtype+") }}</span>@endif</div>";

              donationForm += "<div class='form-group @if($errors->has("+amount+")) has-error @endif'><label for='amount-field'>Blood Amount</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' id='amount-field' name='amount' class='form-control' value='{{ old("+amount+") }}'/>@if($errors->has("+amount+"))<span class='help-block'>{{ $errors->first("+amount+") }}</span>@endif</div>";

              donationForm += "<div class='form-group @if($errors->has("+hospital+")) has-error @endif'><label for='hospital-field'>Hospital</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' class='form-control' id='hospital-field' rows='3' name='hospital'>{{ old("+hospital+") }}@if($errors->has("+hospital+"))<span class='help-block'>{{ $errors->first("+hospital+") }}</span>@endif</div>";

              donationForm += "<div class='form-group'><label for='g_id_field'>Hospital .. Governorate Name </label><select required name='g_id' id='g_id_field' class='form-control'>@foreach ($governorates as $key => $value)<option value='{{ $key+1 }}'>{{ $value["+name+"] }}</option>@endforeach</select></div>";

              donationForm += "<div class='form-group'><label for='c_id_field'>Hospital .. City Name </label><select required name='c_id' id='c_id_field' class='form-control'>@foreach ($cities as $key => $value)<option value='{{ $key+1 }}'>{{ $value["+name+"] }}</option>@endforeach</select></div>";

              donationForm += "<div class='form-group @if($errors->has("+address+")) has-error @endif'><label for='address-field'>Hospital .. Address</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' class='form-control' id='address-field' rows='3'name='address'/>{{ old("+address+") }}@if($errors->has("+address+"))<span class='help-block'>{{ $errors->first("+address+") }}</span>@endif</div>";
              
              donationDiv.innerHTML=donationForm; 

            }
            else if(valueSelected == 2){
              donationDiv=document.getElementById("donationDiv");
              donationDiv.innerHTML = "";
              // Donation Form for 'Money' ...

              var donationForm ="<div class='form-group @if($errors->has("+amount+")) has-error @endif'>";

              donationForm += "<label for='amount-field'>Money Amount</label><span style='color:red; margin-left: 10px;'>*</span>";
              
              donationForm += "<input required type='text' id='amount-field' name='amount' class='form-control' value='{{ old("+amount+") }}'/>";
              
              donationForm += "@if($errors->has("+amount+"))<span class='help-block'>{{ $errors->first("+amount+") }}</span>@endif</div>";
             
              donationDiv.innerHTML=donationForm; 
            } 
            else if(valueSelected == 3){
              donationDiv=document.getElementById("donationDiv");
              donationDiv.innerHTML= "";

              // Donation Form for 'Medicine' ...

              var donationForm =" <div class='form-group @if($errors->has("+name+")) has-error @endif'>";

              donationForm += "<label for='name-field'>Medicine Name</label><span style='color:red; margin-left: 10px;'>*</span>";

              donationForm += "<input required type='text' id='name-field' name='name' class='form-control' value='{{ old("+name+") }}'/>";

              donationForm += " @if($errors->has("+name+"))<span class='help-block'>{{ $errors->first("+name+") }}</span>@endif</div>";

              donationForm += "<div class='form-group @if($errors->has('amount')) has-error @endif'><label for='amount-field'>Medicine Amount</label><span style='color:red; margin-left: 10px;'>*</span>";

              donationForm += "<input required type='text' id='amount-field' name='amount' class='form-control' value='{{ old("+amount+") }}'/>";

              donationForm += "@if($errors->has("+amount+"))<span class='help-block'>{{ $errors->first("+amount+") }}</span>@endif</div>";

              donationDiv.innerHTML=donationForm; 
            } 
            else if(valueSelected == 4){

              donationDiv=document.getElementById("donationDiv");
              donationDiv.innerHTML= "";

              // Donation Form for 'Other' ...

              var donationForm= "<div class='form-group @if($errors->has("+description+")) has-error @endif'><label for='description-field'>Case Description</label> <span style='color:red; margin-left: 10px;'>*</span><textarea required class='form-control' id='description-field' rows='3' name='description'>{{ old("+description+") }}</textarea>";

                donationForm +="@if($errors->has('description'))<span class='help-block'>{{ $errors->first('description') }}</span> @endif</div>";

                donationDiv.innerHTML=donationForm; 

            } 
            else{
                donationDiv=document.getElementById("donationDiv");
                donationDiv.innerHTML= "";
            }

        });
        $("#interval_type_id_field").on("change", function () {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            // console.log(valueSelected);
            if(valueSelected == "" ){
              // console.log("valueSelected");
              intervalDiv=document.getElementById("intervalDiv");
              intervalDiv.innerHTML = "";
            }
            else{
              // console.log(valueSelected);
              intervalDiv=document.getElementById("intervalDiv");
              intervalDiv.innerHTML= "";

              var intervalForm = "<div class='form-group @if($errors->has("+numtimes+")) has-error @endif'>";

              intervalForm += "<label for='numtimes-field'>Number Of Times</label><span style='color:red; margin-left: 10px;'>*</span>";
              
              intervalForm += "<input required type='text' id='numtimes-field' name='numtimes' class='form-control' value='{{ old("+numtimes+") }}'/>";
              
              intervalForm += "@if($errors->has("+numtimes+"))<span class='help-block'>{{ $errors->first("+numtimes+") }}</span>@endif</div>";

              intervalDiv.innerHTML = intervalForm;

            }
        });

      });


    </script>
  <script src="/Admin/form.js"></script>
  <script src="/Admin/vaild.js" type="text/javascript"></script>

@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

          <div class="container" style="width: 900px;height: 900px;">
                
            <div class="stepwizard" >
            <div class="stepwizard-row setup-panel">
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle" style="border-radius: 25px;margin-left: 240px;">1</a>
                <p style="margin-left: 180px;text-align: center;">Case Personal Information</p>
              </div>
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-2" type="button" class="btn btn-default btn-circle"  style="border-radius: 25px;margin-left: 170px;" disabled="disabled">2</a>
                <p style="margin-left: 130px;text-align: center;">Donation Information</p>
              </div>  
            </div>
          </div>

            <form action="{{ route('people.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
                   <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3> Case Personal Information</h3>
                            <!-- Case Personal Information -->


                          <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Case Name</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" class="form-control" id="name-field" rows="3" name="name"/>{{ old("name") }}

                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Case Address</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" class="form-control" id="address-field" rows="3" name="address"/>{{ old("address") }}
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">Case BirthDate</label>
                    <input required type="date" id="birthdate-field" name="birthdate" class="form-control" value="{{ old("birthdate") }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Governorate Name </label>
                      <span style="color:red; margin-left: 10px;">*</span>
                      <select required name="governorate_id" id="governorate_id_field" class="form-control">
                          @foreach ($governorates as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="city_id_field">City Name </label>
                      <span style="color:red; margin-left: 10px;">*</span>
                      <select required name="city_id" id="city_id_field" class="form-control">
                          @foreach ($cities as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label for="gender-field">Case Gender</label>
                    <input required type="text" id="gender-field" name="gender" class="form-control" value="{{ old("gender") }}"/>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('maritalstatus')) has-error @endif">
                       <label for="maritalstatus-field">Case Marital Status</label>
                    <input required type="text" id="maritalstatus-field" name="maritalstatus" class="form-control" value="{{ old("maritalstatus") }}"/>
                       @if($errors->has("maritalstatus"))
                        <span class="help-block">{{ $errors->first("maritalstatus") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Case Phone</label>
                    <input required type="text" id="phone-field" name="phone" class="form-control" value="{{ old("phone") }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Donation Information </h3>
               <!-- Donation Information --> 

                    <div class="form-group">
                      <label for="donation_type_id_field">Donation Type </label>
                      <select required name="donation_type_id" id="donation_type_id_field" class="form-control">
                          <option></option>
                          @foreach ($donate_types as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['type'] }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group" id="donationDiv">
                      
                    </div>

                 <div class="form-group">
                      <label for="interval_type_id_field">Interval Type </label>
                      <select required name="interval_type_id" id="interval_type_id_field" class="form-control">
                          <option></option>
                          @foreach ($interval_types as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['type'] }}</option>
                          @endforeach
                      </select>
                    </div> 

                    <div class="form-group" id="intervalDiv">
                      
                    </div> 
        
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
