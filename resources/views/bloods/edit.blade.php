@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
  <script>
      
      $(document).ready(function () {

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
          $("#interval_type_id_field").on("change", function () {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                // console.log(valueSelected);
                if(valueSelected == 1 ){
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

    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Bloods / Edit #{{$blood->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('bloods.update', $blood->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset style="border: 2px solid lightgray;padding: 20px;margin-bottom: 20px;">
                  <legend>Person Information</legend>
                <div class="row">
                  <div class="col-md-6">
                  <div class="row">
                      <div class="col-md-5">
                        <label for="name-field"> Name</label>
                      </div>
                      <div class="col-md-7">
                        {{ $blood->person->personInfo->name }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="address-field"> Address</label>
                      </div>
                      <div class="col-md-7">
                        {{ $blood->person->personInfo->address }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="birthdate-field"> BirthDate</label>
                      </div>
                      <div class="col-md-7">
                        {{ $blood->person->personInfo->birthdate }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="governorate_id_field"> Governorate Name </label>
                      </div>
                      <div class="col-md-7">
                        {{$blood->person->personInfo->governorate->name}}
                      </div>       
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <label for="city_id_field"> City Name </label>
                      </div>
                      <div class="col-md-7">
                        {{$blood->person->personInfo->city->name}}
                      </div>  
                      </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="gender-field"> Gender</label>
                      </div>
                      <div class="col-md-7">
                        {{ $blood->person->personInfo->gender }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="maritalstatus-field"> Marital Status</label>
                      </div>
                      <div class="col-md-7">
                        {{ $blood->person->personInfo->maritalstatus }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="phone-field"> Phone</label>
                      </div>
                      <div class="col-md-7">
                        {{ $blood->person->personInfo->phone }}
                      </div>
                    </div>
                    </div>
                    </div>
                 </fieldset>
                <fieldset style="border: 2px solid lightgray;padding: 20px;margin-bottom: 20px;">
                <legend>Case Information</legend>
                  <div class="form-group @if($errors->has('publishat')) has-error @endif">
                       <label for="publishat-field">Case Publishat</label>
                    <input type="text" id="publishat-field" name="publishat" class="form-control" value="{{ $blood->person->publishat }}" disabled/>
                       
                    </div>
                    <div class="form-group @if($errors->has('end_date')) has-error @endif">
                       <label for="end_date-field">Case End Date</label>
                    <input required type="text" id="end_date-field" name="end_date" class="form-control" value="{{ $blood->person->end_date }}"/>
                       
                    </div>
                    <div class="form-group">
                      <label for="interval_type_id_field">Interval Type </label>
                      <select required name="interval_type_id" id="interval_type_id_field" class="form-control">
                          @foreach ($interval_types as $key => $value)
                              @if($value['type'] == $blood->person->intervalType->type )
                                <option value="{{ $blood->person->intervalType->id }}" selected>{{ $blood->person->intervalType->type }}</option>
                              @else
                                <option value="{{ $key+1 }}">{{ $value['type']}}</option>
                              @endif
                          @endforeach
                      </select>
                    </div>
                     @if($blood->person->intervalType->id != 1)
                      <div class="form-group @if($errors->has('numtimes')) has-error @endif">
                         <label for="numtimes-field">Interval Number Times</label>
                      <input required type="text" id="numtimes-field" name="numtimes" class="form-control" value="{{ $blood->person->interval->numtimes }}" disabled/>
                         @if($errors->has("numtimes"))
                          <span class="help-block">{{ $errors->first("numtimes") }}</span>
                         @endif
                      </div>
                    @endif
                    <div class="form-group" id="intervalDiv">
                    </div> 
                <div class="form-group @if($errors->has('bloodtype')) has-error @endif">
                       <label for="bloodtype-field">Case Bloodtype</label>
                    <select required type="text" id="bloodtype-field" name="bloodtype" class="form-control" value="{{ $blood->bloodtype }}">
                      @if($blood->bloodtype == "A+")
                        <option value='A+' selected>A+</option>
                        <option value='A-'>A-</option>
                        <option value='B+'>B+</option>
                        <option value='B-'>B-</option>
                        <option value='O+'>O+</option>
                        <option value='O-'>O-</option>
                        <option value='AB+'>AB+</option>
                        <option value='AB-'>AB-</option>
                      @elseif($blood->bloodtype == "A-")
                        <option value='A+'>A+</option>
                        <option value='A-' selected>A-</option>
                        <option value='B+'>B+</option>
                        <option value='B-'>B-</option>
                        <option value='O+'>O+</option>
                        <option value='O-'>O-</option>
                        <option value='AB+'>AB+</option>
                        <option value='AB-'>AB-</option>
                      @elseif($blood->bloodtype == "B+")
                        <option value='A+'>A+</option>
                        <option value='A-'>A-</option>
                        <option value='B+' selected>B+</option>
                        <option value='B-'>B-</option>
                        <option value='O+'>O+</option>
                        <option value='O-'>O-</option>
                        <option value='AB+'>AB+</option>
                        <option value='AB-'>AB-</option>
                      @elseif($blood->bloodtype == "B-")
                        <option value='A+'>A+</option>
                        <option value='A-'>A-</option>
                        <option value='B+'>B+</option>
                        <option value='B-' selected>B-</option>
                        <option value='O+'>O+</option>
                        <option value='O-'>O-</option>
                        <option value='AB+'>AB+</option>
                        <option value='AB-'>AB-</option>
                      @elseif($blood->bloodtype == "O+")
                        <option value='A+'>A+</option>
                        <option value='A-'>A-</option>
                        <option value='B+'>B+</option>
                        <option value='B-'>B-</option>
                        <option value='O+' selected>O+</option>
                        <option value='O-'>O-</option>
                        <option value='AB+'>AB+</option>
                        <option value='AB-'>AB-</option>
                      @elseif($blood->bloodtype == "O-")
                        <option value='A+'>A+</option>
                        <option value='A-'>A-</option>
                        <option value='B+'>B+</option>
                        <option value='B-'>B-</option>
                        <option value='O+'>O+</option>
                        <option value='O-' selected>O-</option>
                        <option value='AB+'>AB+</option>
                        <option value='AB-'>AB-</option>
                      @elseif($blood->bloodtype == "AB+")
                        <option value='A+'>A+</option>
                        <option value='A-'>A-</option>
                        <option value='B+'>B+</option>
                        <option value='B-'>B-</option>
                        <option value='O+'>O+</option>
                        <option value='O-'>O-</option>
                        <option value='AB+' selected>AB+</option>
                        <option value='AB-'>AB-</option>
                      @else
                        <option value='A+'>A+</option>
                        <option value='A-'>A-</option>
                        <option value='B+'>B+</option>
                        <option value='B-'>B-</option>
                        <option value='O+'>O+</option>
                        <option value='O-'>O-</option>
                        <option value='AB+'>AB+</option>
                        <option value='AB-' selected>AB-</option>
                      @endif
                    </select>
                       @if($errors->has("bloodtype"))
                        <span class="help-block">{{ $errors->first("bloodtype") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('amount')) has-error @endif">
                       <label for="amount-field">Blood Amount</label>
                    <input required type="text" id="amount-field" name="amount" class="form-control" value="{{ $blood->amount }}"/>
                       @if($errors->has("amount"))
                        <span class="help-block">{{ $errors->first("amount") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('hospital')) has-error @endif">
                       <label for="hospital-field">Hospital</label>
                    <input required type="text" class="form-control" id="hospital-field" rows="3" name="hospital" value="{{ $blood->hospital }}"></input type="text">
                       @if($errors->has("hospital"))
                        <span class="help-block">{{ $errors->first("hospital") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Hospital .. Governorate Name </label>
                      <select required name="governorate_id" id="governorate_id_field" class="form-control">
                          @foreach ($governorates as $key => $value)
                              <option value="{{ $key+1 }}" selected>{{ $blood->governorate->name }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="city_id_field">Hospital .. City Name </label>
                      <select required name="city_id" id="city_id_field" class="form-control">
                          @foreach ($cities as $key => $value)
                              <option value="{{ $key+1 }}">{{ $blood->city->name }}</option>
                          @endforeach
                      </select>
                      </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Hospital Address</label>
                    <input required type="text" class="form-control" id="address-field" rows="3" name="address" value="{{ $blood->address }}"></input type="text">
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                     <div class="form-group">
                      <label for="case_doc_field">Case Documents</label>

                       @foreach($docs as $doc)
                        <div class="row">
                        <div class="col-md-4">
                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/blood/$doc->document") }}" alt="$doc->document" /></div>
                        <div class="col-md-8">
                        <label for="case_doc_field">Document Description :</label>
                        <input name="desc" class="form-control" value="{{$doc->desc}}" /></div>
                        </div>
                        <div class="row">
                        <div class="col-md-4" style="margin-top: 5px;">
                        <label for="case_doc_field">Update Case Documents</label>
                        <input type="file" id="case_doc_field" name="case_doc" value="{{ old("case_doc") }}"/></div>
                        <div class="col-md-8">
                        <label for="case_doc_field">Document Description :</label>
                        <input name="desc" class="form-control"/></div>
                        </div>
                         @if($errors->has("case_doc"))
                          <span class="help-block">{{ $errors->first("case_doc") }}</span>
                         @endif
                      @endforeach
                    </div>
                    </fieldset>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('bloods.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
