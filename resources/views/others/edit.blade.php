@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Others / Edit #{{$other->id}}</h1>
    </div>

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

@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('others.update', $other->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                 <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Case Name</label>
                    <input required type="text" class="form-control" id="name-field" rows="3" name="name" value="{{ $other->person->personInfo->name }}"></input type="text">
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Case Address</label>
                    <input required type="text" class="form-control" id="address-field" rows="3" name="address" value="{{ $other->person->personInfo->address }}"></input type="text">
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">Case BirthDate</label>
                    <input required type="date" id="birthdate-field" name="birthdate" class="form-control" value="{{ $other->person->personInfo->birthdate }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Case Governorate Name </label>
                      <select required name="governorate_id" id="governorate_id_field" class="form-control">
                          @foreach ($governorates as $key => $value)
                              @if($value["name"] == $other->person->personInfo->governorate->name )
                                <option value="{{ $key+1 }}" selected>{{ $value["name"] }}</option>
                              @else
                                <option value="{{ $key+1 }}">{{ $value["name"] }}</option>
                              @endif
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="city_id_field">Case City Name </label>
                      <select required name="city_id" id="citySelect" class="form-control">
                          <option value="{{$other->person->personInfo->city_id}}">{{$other->person->personInfo->city->name}}</option>
                          <option></option>
                            
                      </select>
                    </div>
                 <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label for="gender-field">Case Gender</label>
                        <select required id="gender-field" name="gender" class="form-control">
                        @if ( $other->person->personInfo->gender == "male")
                            <option value="male" selected>male</option>
                            <option value="female">female</option>
                        @else
                            <option value="male">male</option>
                            <option value="female" selected>female</option>
                        @endif
                        </select>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('maritalstatus')) has-error @endif">
                       <label for="maritalstatus-field">Case Marital Status</label>
                    <select required type="text" id="maritalstatus-field" name="maritalstatus" class="form-control">
                    @if($other->person->personInfo->maritalstatus == "single")
                        <option value="single" selected>Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widow">Widow</option>
                    @elseif($other->person->personInfo->maritalstatus == "married")
                        <option value="single">Single</option>
                        <option value="married" selected>Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widow">Widow</option>
                    @elseif($other->person->personInfo->maritalstatus == "divorced")
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced" selected>Divorced</option>
                        <option value="widow">Widow</option>
                    @else
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widow" selected>Widow</option>
                    @endif
                    </select>
                       @if($errors->has("maritalstatus"))
                        <span class="help-block">{{ $errors->first("maritalstatus") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Case Phone</label>
                    <input required type="text" id="phone-field" name="phone" class="form-control" value="{{ $other->person->personInfo->phone }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                <div class="form-group @if($errors->has('publishat')) has-error @endif">
                       <label for="publishat-field">Case Publishat</label>
                    <input required type="text" id="publishat-field" name="publishat" class="form-control" value="{{ $other->person->publishat }}" disabled/>
                       @if($errors->has("publishat"))
                        <span class="help-block">{{ $errors->first("publishat") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="interval_type_id_field">Interval Type </label>
                      <select required name="interval_type_id" class="form-control" id="interval_type_id_field">
                          
                          @foreach ($interval_types as $key => $value)
                              @if($value['type'] == $other->person->intervalType->type )
                                <option value="{{ $other->person->interval_type_id }}" selected>{{ $other->person->intervalType->type }}</option>
                              @else
                                <option value="{{ $key+1 }}">{{ $value['type']}}</option>
                              @endif
                          @endforeach
                      </select>
                    </div>
                     @if($other->person->intervalType->id != 1)
                      <div class="form-group @if($errors->has('numtimes')) has-error @endif">
                         <label for="numtimes-field">Interval Number Times</label>
                      <input required type="text" id="numtimes-field" name="numtimes" class="form-control" value="{{ $other->person->interval->numtimes }}" disabled/>
                         @if($errors->has("numtimes"))
                          <span class="help-block">{{ $errors->first("numtimes") }}</span>
                         @endif
                      </div>
                    @endif
                    <div class="form-group" id="intervalDiv">
                    </div> 
                <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Case Description</label>
                    <textarea required class="form-control" id="description-field" rows="3" name="description">{{ $other->description }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>

                    <div class="form-group">
                      <label for="case_doc_field">Case Documents</label>

                      @foreach($docs as $doc)
                        <div class="row">
                        <div class="col-md-4">
                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/other/$doc->document") }}" alt="$doc->document" /></div>
                        <div class="col-md-8">
                        <label for="case_doc_field">Document Description :</label>
                        <input name="desc" class="form-control" value="{{$doc->desc}}" disabled/></div>
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
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('others.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
