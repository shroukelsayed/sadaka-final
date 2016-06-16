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
      });
      
    </script>
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> PersonInfos / Edit #{{$person_info->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('person_infos.update', $person_info->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <textarea class="form-control" id="name-field" rows="3" name="name">{{ $person_info->name }}</textarea>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <textarea class="form-control" id="address-field" rows="3" name="address">{{ $person_info->address }}</textarea>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Case Governorate Name </label>
                      <select required name="governorate_id" id="governorate_id_field" class="form-control">
                          @foreach ($governorates as $key => $value)
                              @if($value["name"] == $person_info->governorate->name )
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
                          <option value="{{$person_info->city_id}}">{{$person_info->city->name}}</option>
                          <option></option>
                      </select>
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">BirthDate</label>
                    <input type="text" id="birthdate-field" name="birthdate" class="form-control" value="{{ $person_info->birthdate }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label for="gender-field">Gender</label>
                    <select required id="gender-field" name="gender" class="form-control">
                        @if ( $person_info->gender == "male")
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
                       <label for="maritalstatus-field">Maritalstatus</label>
                    <select required type="text" id="maritalstatus-field" name="maritalstatus" class="form-control">
                    @if($person_info->maritalstatus == "single")
                        <option value="single" selected>Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widow">Widow</option>
                    @elseif($person_info->maritalstatus == "married")
                        <option value="single">Single</option>
                        <option value="married" selected>Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widow">Widow</option>
                    @elseif($person_info->maritalstatus == "divorced")
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
                       <label for="phone-field">Phone</label>
                    <input type="text" id="phone-field" name="phone" class="form-control" value="{{ $person_info->phone }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('person_infos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
