@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> People / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('people.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <textarea class="form-control" id="name-field" rows="3" name="name">{{ old("name") }}</textarea>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <textarea class="form-control" id="address-field" rows="3" name="address">{{ old("address") }}</textarea>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">BirthDate</label>
                    <input type="date" id="birthdate-field" name="birthdate" class="form-control" value="{{ old("birthdate") }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Governorate Name </label>
                      <select name="governorate_id" id="governorate_id_field">
                          @foreach ($governorates as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="city_id_field">City Name </label>
                      <select name="city_id" id="city_id_field">
                          @foreach ($cities as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label for="gender-field">Gender</label>
                    <input type="text" id="gender-field" name="gender" class="form-control" value="{{ old("gender") }}"/>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('maritalstatus')) has-error @endif">
                       <label for="maritalstatus-field">Maritalstatus</label>
                    <input type="text" id="maritalstatus-field" name="maritalstatus" class="form-control" value="{{ old("maritalstatus") }}"/>
                       @if($errors->has("maritalstatus"))
                        <span class="help-block">{{ $errors->first("maritalstatus") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Phone</label>
                    <input type="text" id="phone-field" name="phone" class="form-control" value="{{ old("phone") }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                <div class="form-group @if($errors->has('publishat')) has-error @endif">
                       <label for="publishat-field">Publishat</label>
                    <input type="date" id="publishat-field" name="publishat" class="form-control" value="{{ old("publishat") }}"/>
                       @if($errors->has("publishat"))
                        <span class="help-block">{{ $errors->first("publishat") }}</span>
                       @endif
                    </div>
                
                    <div class="form-group">
                      <label for="donation_type_id_field">Donation Type </label>
                      <select name="donation_type_id" id="donation_type_id_field">
                          @foreach ($donate_types as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['type'] }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="interval_type_id_field">Interval Type </label>
                      <select name="interval_type_id" id="interval_type_id_field">
                          @foreach ($interval_types as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['type'] }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group @if($errors->has('amount')) has-error @endif">
                       <label for="amount-field">Donation Money Amount</label>
                    <input type="text" id="amount-field" name="amount" class="form-control" value="{{ old("amount") }}"/>
                       @if($errors->has("amount"))
                        <span class="help-block">{{ $errors->first("amount") }}</span>
                       @endif
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