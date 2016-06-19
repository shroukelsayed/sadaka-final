@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
<style>
  #paid{

    width:350px;
  }

</style>
<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="/Admin/vaild.js" type="text/javascript"></script>
<script>
  
    $(document).ready(function () {

      $('#paid1').blur(function() {
          $('span.error-keyup-2').remove();
          var oldpaid=document.getElementById("paid").value; 
          var amount=document.getElementById("amount").value;
          var remainder= amount-oldpaid;
          console.log("ghada");
          console.log(oldpaid);
          console.log(amount);
          console.log(remainder);
          var newpaid=document.getElementById("paid1").value;
          // alert("error");
          if (remainder < newpaid) {  
            // alert("error");
            $(this).after('<span class="error error-keyup-2">Paid can\'t be more than Total Amount</span>');
            $(this).focus();
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
        <h1><i class="glyphicon glyphicon-edit"></i> Money / Edit #{{$money->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('money.update', $money->id) }}" method="POST" enctype="multipart/form-data">
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
                        {{ $money->person->personInfo->name }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="address-field"> National ID</label>
                      </div>
                      <div class="col-md-7">
                        {{ $money->person->personInfo->nationalid }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="birthdate-field"> BirthDate</label>
                      </div>
                      <div class="col-md-7">
                        {{ $money->person->personInfo->birthdate }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="governorate_id_field"> Address </label>
                      </div>
                      <div class="col-md-7">
                        {{$money->person->personInfo->address}}
                      </div>       
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="governorate_id_field"> Governorate Name </label>
                      </div>
                      <div class="col-md-7">
                        {{$money->person->personInfo->governorate->name}}
                      </div>       
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-5">
                        <label for="city_id_field"> City Name </label>
                      </div>
                      <div class="col-md-7">
                        {{$money->person->personInfo->city->name}}
                      </div>  
                      </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="gender-field"> Gender</label>
                      </div>
                      <div class="col-md-7">
                        {{ $money->person->personInfo->gender }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="maritalstatus-field"> Marital Status</label>
                      </div>
                      <div class="col-md-7">
                        {{ $money->person->personInfo->maritalstatus }}
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5">
                        <label for="phone-field"> Phone</label>
                      </div>
                      <div class="col-md-7">
                        {{ $money->person->personInfo->phone }}
                      </div>
                    </div>
                    </div>
                    </div>
                 </fieldset>
                <fieldset style="border: 2px solid lightgray;padding: 20px;margin-bottom: 20px;">
                <legend>Case Information</legend>
                  <div class="form-group @if($errors->has('publishat')) has-error @endif">
                       <label for="publishat-field">Case Publishat</label>
                    <input required type="text" id="publishat-field" name="publishat" class="form-control" value="{{ $money->person->publishat }}" disabled/>
                       @if($errors->has("publishat"))
                        <span class="help-block">{{ $errors->first("publishat") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="interval_type_id_field">Interval Type </label>
                      <select required class="form-control" name="interval_type_id" id="interval_type_id_field">
                           @foreach ($interval_types as $key => $value)
                              @if($value['type'] == $money->person->intervalType->type )
                                <option value="{{ $money->person->interval_type_id}}" selected>{{ $money->person->intervalType->type }}</option>
                              @else
                                <option value="{{ $key+1 }}">{{ $value['type']}}</option>
                              @endif
                          @endforeach
                      </select>
                    </div>
                    @if(!($money->person->interval_type_id == 1))
                      <div class="form-group @if($errors->has('numtimes')) has-error @endif">
                         <label for="numtimes-field">Interval Number Times</label>
                      <input required type="text" id="numtimes-field" name="numtimes" class="form-control" value="{{ $money->person->interval->numtimes }}" disabled/>
                         @if($errors->has("numtimes"))
                          <span class="help-block">{{ $errors->first("numtimes") }}</span>
                         @endif
                      </div>
                    @endif
                    <div class="form-group" id="intervalDiv">
                    </div> 
                    <div class="form-group">
                      <label for="interval_type_id_field">Status </label>
                      <select required class="form-control" name="status_type_id" id="interval_type_id_field">
                           @foreach ($status as $key => $value)
                              @if($value['type'] == $money->person->personStatus->type )
                                <option value="{{ $money->person->person_status_id}}" selected>{{ $money->person->personStatus->type }}</option>
                              @else
                                <option value="{{ $key+1 }}">{{ $value['type']}}</option>
                              @endif
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group @if($errors->has('amount')) has-error @endif">
                       <label for="amount-field">Case Amount</label>
                    <input required type="text" id="amount" name="amount" class="form-control" value="{{ $money->amount }}"/>
                       @if($errors->has("amount"))
                        <span class="help-block">{{ $errors->first("amount") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('paid')) has-error @endif">
                    <div style="float: left; width: 400px;"> 

                       <label for="paid-field">Paid</label>
                    <input required type="text" id="paid" name="oldpaid" class="form-control" value="{{ $money->paid }}" disabled="" />
                       @if($errors->has("paid"))
                        <span class="help-block">{{ $errors->first("paid") }}</span>
                       @endif
                       </div>

                       <span>+</span>

                      <div style="float: right; width: 400px;"> 
                      <label for="paid-field">New Paid</label>
                       <input type="text" id="paid1" name="paid" class="form-control" value=""/>
                       @if($errors->has("paid"))
                        <span class="help-block">{{ $errors->first("paid") }}</span>
                       @endif
                       <br>
                      </div> 
                    </div>
                    <br>

                     <div class="form-group">
                      <label for="case_doc_field">Case Documents</label>

                      @foreach($docs as $doc)
                        <div class="row">
                        <div class="col-md-4">
                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/money/$doc->document") }}" alt="$doc->document" /></div>
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
                    </fieldset>
                    <div class="well well-sm">
                      <button type="submit" class="btn btn-primary">Save</button>
                      <a class="btn btn-link pull-right" href="{{ route('money.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
