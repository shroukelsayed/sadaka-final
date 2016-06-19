@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/Admin/form.css">
  
@endsection
@section('header')

    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
    <div class="page-header">
       
    </div>
    <script>

    $(document).on("keydown", '#end_date', function (event) {
       // event.preventDefault();
       $('#end_date').datepicker({
              dateFormat: 'yy/mm/dd'
          });  
    });

      $(document).ready(function () {


    // ------------- DateTime Picker ----------------
         $("#datetimepicker").keydown(function(event){
              event.preventDefault();          
          }); 

          $("#datetimepicker").datepicker({
              dateFormat: 'yy/mm/dd'
          }); 

          case_name_err = $('#case_name');
          $(":input[name='name']").on("blur", function () {
          var sentData = {'name': $(":input[name='name']").val(), '_token': $('input[name=_token]').val()};
          console.log(sentData);
              $.ajax({
                  url: '/people/create/?action=name',
                  type: "POST",
                  data: {'name': $(":input[name='name']").val(), '_token': $('input[name=_token]').val()},

                  success: function (data) {
                      // alert(data);
                      console.log(data.length==0); 
                      if( ! ( data.length==0 )){
                          console.log("not Available");
                          case_name_err.html("<b>Username already taken</b>");   
                      }
                  }
              });
          });

          person_search = document.getElementById("person_search");
          $(":input[name='person_name']").on("keyup", function () {
              if( $(":input[name='person_name']").val() == ""){
                  person_search.innerHTML == "";
              }
              $.ajax({
                  url: '/people/search/?action=person_name',
                  type: "POST",
                  data: {'person_name': $(":input[name='person_name']").val(), '_token': $('input[name=_token]').val()},

                  success: function (data) {
                      if(data.length==0 || $(":input[name='person_name']").val() == "" ){
                          // console.log("Not Found");
                          person_search.innerHTML = "";
                      }else{
                          // console.log(data.length);
                          var html = '<div class="row" style="margin-top:10px;">';

                          for(i = 0; i < data.length; i++){
                            html += '<div class="col-md-4">';
                            html += '<div class="box box-widget widget-user-2">';
                            html += '<div class="widget-user-header bg-yellow">';
                            html += '<h3 class="widget-user-username">'+data[i].name+'</h3>';
                            html += '</div>';
                            html += '<div class="box-footer no-padding">';
                            html += '<ul class="nav nav-stacked">';
                            html += '<li><a href="#">ID<span style="margin-left:90px;">'+data[i].id+'</span></a></li>';
                            html += '<li><a href="#">Phone<span style="margin-left:50px;">'+data[i].phone+'</span></a></li>';
                            html += '<li><a href="#">Address<span style="margin-left:50px;">'+data[i].address+'</span></a></li>';
                            html += '<li><label class="c-input c-checkbox"><input type="radio" style="margin-left:50px;" name="checked_person" id="checked_person" value="'+data[i].id+'"><span class="c-indicator"></span>&nbsp&nbsp Choose</label></li>';
                            html += '</ul>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                          }
                          html += '</div>';
                          person_search.innerHTML = html;   
                      }
                  }
              });
          });

          // check for existing person info --> by shrouk
          firstBtn = $("#firstBtn");
          
          firstBtn.click(function(){
              var curStep = $(this).closest(".setup-content"),
                  curStepBtn = curStep.attr("id"),
                  nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                  curInputs = curStep.find("input[type='text'],input[type='url']"),
                  isValid = true;
                  checked_person = document.getElementById("checked_person");
                  // console.log("in");
                  // console.log(checked_person.value);

              if(checked_person.value){

                  // console.log(checked_person.value);
                  $('#nationalid-field').remove();
                  $('#name-field').remove();
                  $('#address-field').remove();
                  $('#datetimepicker').remove();
                  $('#governorate_id_field').remove();
                  $('#citySelect').remove();
                  $('#gender-field').remove();
                  $('#maritalstatus-field').remove();
                  $('#phone-field').remove();

                  if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
              }
             
          });

          $('#governorate_id_field').change(function(){
                  $.get("{{ url('api/dropdown')}}", 
                      { option: $(this).val() }, 
                      function(data) {
                        console.log(data);
                          var city = $('#citySelect');
                          city.empty();
                          console.log(city.id);
                          $.each(data, function(index, element) {
                              city.append("<option value='"+ element['id'] +"'>" + element['name'] + "</option>");
                          });
                      });
              });


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
                


                var donationForm = '<div class="form-group @if($errors->has('title')) has-error @endif"><label for="title-field"> Title</label><span style="color:red; margin-left: 10px;">*</span><input required type="text" class="form-control" id="title-field" rows="3" name="title"/>{{ old("title") }}<span id="title" class="help-block"></span>@if($errors->has("title"))<span class="help-block">{{ $errors->first("title") }}</span>@endif</div>';

                donationForm += '<div class="form-group @if($errors->has('casedesc')) has-error @endif"><label for="casedesc-field"> Description </label><span style="color:red; margin-left: 10px;">*</span><textarea placeholder=" Enter Your Description" class="form-control register-input" id="casedesc-field" rows="3" name="casedesc" style="resize:none" required>{{ old("casedesc") }}</textarea> <span id="casedesc" class="help-block"></span>@if($errors->has("casedesc"))<span class="help-block">{{ $errors->first("casedesc") }}</span>@endif</div>';

                donationForm += "<div class='form-group @if($errors->has("+bloodtype+")) has-error @endif'><label for='bloodtype-field'>Case Bloodtype</label><span style='color:red; margin-left: 10px;'>*</span><select required name='bloodtype' id='bloodtype-field' class='form-control'><option value='A+'>A+</option><option value='A-'>A-</option><option value='B+'>B+</option><option value='B-'>B-</option><option value='O+'>O+</option><option value='O-'>O-</option><option value='AB+'>AB+</option><option value='AB-'>AB-</option></select></div>";

                donationForm += "<div class='form-group @if($errors->has("+amount+")) has-error @endif'><label for='amount-field'>Blood Amount</label><span style='color:red; margin-left: 10px;'>*</span><select required name='amount' id='amount-field' class='form-control'><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option></select>@if($errors->has("+amount+"))<span class='help-block'>{{ $errors->first("+amount+") }}</span>@endif</div>";

                donationForm += "<div class='form-group @if($errors->has("+hospital+")) has-error @endif'><label for='hospital-field'>Hospital</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' class='form-control' id='hospital-field' rows='3' name='hospital'>{{ old("+hospital+") }}@if($errors->has("+hospital+"))<span class='help-block'>{{ $errors->first("+hospital+") }}</span>@endif</div>";

                donationForm += "<div class='form-group @if($errors->has("+address+")) has-error @endif'><label for='address-field'>Hospital .. Address</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' class='form-control' id='address-field' rows='3'name='address'/>{{ old("+address+") }}@if($errors->has("+address+"))<span class='help-block'>{{ $errors->first("+address+") }}</span>@endif</div>";

                donationForm += "<div class='form-group @if($errors->has("+end_date+")) has-error @endif'><label for='datetimepicker'>End date</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' class='form-control' id='end_date' name='end_date'/>{{ old("+end_date+") }}@if($errors->has("+end_date+"))<span class='help-block'>{{ $errors->first("+end_date+") }}</span>@endif</div>";
                
                donationDiv.innerHTML=donationForm; 

              }
              else if(valueSelected == 2){
                donationDiv=document.getElementById("donationDiv");
                donationDiv.innerHTML = "";
                // Donation Form for 'Money' ...
                var donationForm = '<div class="form-group @if($errors->has('title')) has-error @endif"><label for="title-field"> Title</label><span style="color:red; margin-left: 10px;">*</span><input required type="text" class="form-control" id="title-field" rows="3" name="title"/>{{ old("title") }}<span id="title" class="help-block"></span>@if($errors->has("title"))<span class="help-block">{{ $errors->first("title") }}</span>@endif</div>';

                donationForm += '<div class="form-group @if($errors->has('casedesc')) has-error @endif"><label for="casedesc-field"> Description </label><span style="color:red; margin-left: 10px;">*</span><textarea placeholder=" Enter Your Description" class="form-control register-input" id="casedesc-field" rows="3" name="casedesc" style="resize:none" required>{{ old("casedesc") }}</textarea> <span id="casedesc" class="help-block"></span>@if($errors->has("casedesc"))<span class="help-block">{{ $errors->first("casedesc") }}</span>@endif</div>';

               donationForm +="<div class='form-group @if($errors->has("+amount+")) has-error @endif'>";

                donationForm += "<label for='amount-field'>Money Amount</label><span style='color:red; margin-left: 10px;'>*</span>";
                
                donationForm += "<input required type='text' id='amount-field' name='amount' class='form-control' value='{{ old("+amount+") }}'/>";
                
                donationForm += "@if($errors->has("+amount+"))<span class='help-block'>{{ $errors->first("+amount+") }}</span>@endif</div>";
               
                donationDiv.innerHTML=donationForm; 
              } 
              else if(valueSelected == 3){
                donationDiv=document.getElementById("donationDiv");
                donationDiv.innerHTML= "";

                // Donation Form for 'Medicine' ...
                var donationForm = '<div class="form-group @if($errors->has('title')) has-error @endif"><label for="title-field"> Title</label><span style="color:red; margin-left: 10px;">*</span><input required type="text" class="form-control" id="title-field" rows="3" name="title"/>{{ old("title") }}<span id="title" class="help-block"></span>@if($errors->has("title"))<span class="help-block">{{ $errors->first("title") }}</span>@endif</div>';

                donationForm += '<div class="form-group @if($errors->has('casedesc')) has-error @endif"><label for="casedesc-field"> Description </label><span style="color:red; margin-left: 10px;">*</span><textarea placeholder=" Enter Your Description" class="form-control register-input" id="casedesc-field" rows="3" name="casedesc" style="resize:none" required>{{ old("casedesc") }}</textarea> <span id="casedesc" class="help-block"></span>@if($errors->has("casedesc"))<span class="help-block">{{ $errors->first("casedesc") }}</span>@endif</div>';

                donationForm +=" <div class='form-group @if($errors->has("+name+")) has-error @endif'>";

                donationForm += "<label for='name-field'>Medicine Name</label><span style='color:red; margin-left: 10px;'>*</span>";

                donationForm += "<input required type='text' id='name-field' name='medicine_name' class='form-control' value='{{ old("+name+") }}'/>";

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
                var donationForm = '<div class="form-group @if($errors->has('title')) has-error @endif"><label for="title-field"> Title</label><span style="color:red; margin-left: 10px;">*</span><input required type="text" class="form-control" id="title-field" rows="3" name="title"/>{{ old("title") }}<span id="title" class="help-block"></span>@if($errors->has("title"))<span class="help-block">{{ $errors->first("title") }}</span>@endif</div>';

                donationForm += '<div class="form-group @if($errors->has('casedesc')) has-error @endif"><label for="casedesc-field"> Description </label><span style="color:red; margin-left: 10px;">*</span><textarea placeholder=" Enter Your Description" class="form-control register-input" id="casedesc-field" rows="3" name="casedesc" style="resize:none" required>{{ old("casedesc") }}</textarea> <span id="casedesc" class="help-block"></span>@if($errors->has("casedesc"))<span class="help-block">{{ $errors->first("casedesc") }}</span>@endif</div>';
                
                donationForm += "<div class='form-group @if($errors->has("+description+")) has-error @endif'><label for='description-field'>Case Description</label> <span style='color:red; margin-left: 10px;'>*</span><textarea required class='form-control' id='description-field' rows='3' name='description'>{{ old("+description+") }}</textarea>";

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
              if(valueSelected == "" || valueSelected == 1 ){
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


          var next = 0;
          $("#add-more").click(function(e){
              e.preventDefault();
              var addto = "#field" + next;
              var addRemove = "#field" + (next);
              next = next + 1;

              var newIn = '<div id="field'+ next +'" name="field'+ next +'">';
              newIn += '<div class="form-group"><div class="row"><div class="col-md-5"><label for="case_doc_field" style="margin-left: -225px;"> Document Description: </label><span style="color:red; margin-left: 10px;">*</span><input type="text" name="desc[]" placeholder="Enter Document Description" class="form-control" style="margin-left: -225px;" /></div>';

              newIn += '<div class="col-md-4"><div style="margin-left: 365px;margin-top: -30px;">{!! Form::file("case_doc[]", array("multiple"=>true )) !!}</div>@if($errors->has("case_doc"))<span class="help-block">{{ $errors->first("case_doc") }}<span>@endif</div>';
              
              var newInput = $(newIn);
              var removeBtn = '<div class="col-md-3"><button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" style="float: right;margin-right: -550px;margin-top: -50px;">Remove</button></div></div></div></div></div><div id="field">';
              var removeButton = $(removeBtn);
              $(addto).after(newInput);
              $(addRemove).after(removeButton);
              $("#field" + next).attr('data-source',$(addto).attr('data-source'));
              $("#count").val(next);  
              
              $('.remove-me').click(function(e){
                  e.preventDefault();
                  var fieldNum = this.id.charAt(this.id.length-1);
                  var fieldID = "#field" + fieldNum;
                  $(this).remove();
                  $(fieldID).remove();
              });
          });

      });
  
    </script>

  <script src="/Admin/form.js"></script>
  <script src="/Admin/vaild.js" type="text/javascript"></script>
@endsection

@section('content')
  @include('error')
  <fieldset style="border: 2px solid lightgray;padding: 20px;margin-bottom: 20px;margin-left: -40px;">
    <legend> New Case </legend>
    <div class="row">
        <div class="col-md-12">
          <div class="container" style="width: 900px;height: 900px;">
            <div class="stepwizard" >
            <div class="stepwizard-row setup-panel">
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle" style="border-radius: 25px;margin-left: 140px;">1</a>
                <p style="margin-left: 80px;text-align: center;">Case Personal Information</p>
              </div>
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" style="border-radius: 25px;margin-left: 100px;" disabled="disabled">2</a>
                <p style="margin-left: 60px;text-align: center;">Donation Information</p>
              </div> 
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" style="border-radius: 25px;margin-left: 170px;" disabled="disabled">3</a>
                <p style="margin-left: 130px;text-align: center;">Case Documents</p>
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
                            <div class="containeer" style="">
                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="pill" href="#menu1" style="width: 200px; text-align: center;width: 200px;">Existing Person</a></li>
                              <li><a data-toggle="pill" href="#menu2" style="width: 200px; text-align: center;">New Person</a></li>
                            </ul>
                            <div class="tab-content">
                              <div id="menu1" class="tab-pane fade in active">
                                <h3>Existing Person</h3>
                                
                                <!-- // search for existing PersonInfo  -->
                                <input type="search" name="person_name" class="form-control" placeholder="Search By Name or National ID ..." />
                                <div id="person_search" style="width: 700px;"></div>
                                
                                <button id="firstBtn" class="btn btn-primary nextBtn btn-lg pull-right" type="button" style="margin-top: 20px;" >Next</button>

                              </div>
                              <div id="menu2" class="tab-pane fade">
                                <h3>New Person</h3>

                                <!-- // adding new PersonInfo  -->
                                 <div class="form-group @if($errors->has('national_id')) has-error @endif">
                       <label for="national_id-field"> National ID</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" class="form-control" id="nationalid-field" rows="3" name="national_id"/>{{ old("national_id") }}
                        <span id="national_id" class="help-block"></span>
                       @if($errors->has("national_id"))
                        <span class="help-block">{{ $errors->first("national_id") }}</span>
                       @endif
                    </div>

                          <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field"> Name</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" class="form-control" id="name-field" rows="3" name="name"/>{{ old("name") }}
                        <span id="case_name" class="help-block"></span>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field"> Address</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" class="form-control" id="address-field" rows="3" name="address"/>{{ old("address") }}
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field"> BirthDate</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" id="datetimepicker" name="birthdate" class="form-control" value="{{ old("birthdate") }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Governorate Name </label>
                      <span style="color:red; margin-left: 10px;">*</span>
                      <select required name="governorate_id" id="governorate_id_field" class="form-control">
                          <option value="">Select</option>
                          @foreach ($governorates as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="citySelect">City Name </label>
                      <span style="color:red; margin-left: 10px;">*</span>
                      <select required name="city_id" id="citySelect" class="form-control">
                          <option></option>
                      </select>
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label for="gender-field"> Gender</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                        <select class="form-control" required 
                                name="gender" id="gender-field">
                            <option value="">Select</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('maritalstatus')) has-error @endif">
                       <label for="maritalstatus-field"> Marital Status</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                        <select class="form-control" required id="maritalstatus-field" 
                            name="maritalstatus">
                            <option value="">Select</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widow">Widow</option>
                        </select>
                       @if($errors->has("maritalstatus"))
                        <span class="help-block">{{ $errors->first("maritalstatus") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field"> Phone</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" id="phone-field" name="phone" class="form-control" value="{{ old("phone") }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>

                      <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>

                    </div>
                  </div>
                </div>
                            
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
                      <span style="color:red; margin-left: 10px;">*</span>
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
                      <span style="color:red; margin-left: 10px;">*</span>
                      <select required name="interval_type_id" id="interval_type_id_field" class="form-control">
                          @foreach ($interval_types as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['type'] }}</option>
                          @endforeach
                      </select>
                    </div> 

                    <div class="form-group" id="intervalDiv">
                    </div> 

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>

                  </div>
                </div>
              </div>

               <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                  <div class="col-md-12" >
                    <h3>  Documents</h3>
                    <div id="field">
                    <div id="field0">
                
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-5"><label for="case_doc_field"> Document Description: </label><span style="color:red; margin-left: 10px;">*</span><input type="text" name="desc[]" placeholder="Enter Document Description" class="form-control" />
                        </div>
                        <div class="col-md-4"> 
                        {!! Form::file('case_doc[]', array('multiple'=>true ,'required'=>true ,'class="pull-right"','style="margin-top: 25px;"')) !!}
                        
                           @if($errors->has("case_doc"))
                            <span class="help-block">{{ $errors->first("case_doc") }}</span>
                          @endif
                      </div>
                    </div>
                  </div>


                </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                  <div class="col-md-4">
                    <button id="add-more" name="add-more" style="float: right; margin-right: -450px;" class="btn btn-primary">Add More</button>
                  </div>
                </div>
                <br><br>
                                

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
    </fieldset>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
