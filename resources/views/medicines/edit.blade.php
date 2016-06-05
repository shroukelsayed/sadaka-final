@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Medicines / Edit #{{$medicine->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('medicines.update', $medicine->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Case Name</label>
                    <input required type="text" class="form-control" id="name-field" rows="3" name="name" value="{{ $medicine->person->personInfo->name }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Case Address</label>
                    <input required type="text" class="form-control" id="address-field" rows="3" name="address" value="{{ $medicine->person->personInfo->address }}"/>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">Case BirthDate</label>
                    <input required type="date" id="birthdate-field" name="birthdate" class="form-control" value="{{ $medicine->person->personInfo->birthdate }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Case Governorate Name </label>
                      <select required name="governorate_id" id="governorate_id_field" class="form-control">
                          @foreach ($governorates as $key => $value)
                              <option value="{{ $key+1 }}" selected>{{ $medicine->person->personInfo->governorate->name }}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="city_id_field">Case City Name </label>
                      <select required name="city_id" id="city_id_field" class="form-control">
                          @foreach ($cities as $key => $value)
                              <option value="{{ $key+1 }}">{{ $medicine->person->personInfo->city->name }}</option>
                          @endforeach
                      </select>
                    </div>
                 <div class="form-group @if($errors->has('gender')) has-error @endif">
                       <label for="gender-field">Case Gender</label>
                    <input required type="text" id="gender-field" name="gender" class="form-control" value="{{ $medicine->person->personInfo->gender }}"/>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('maritalstatus')) has-error @endif">
                       <label for="maritalstatus-field">Case Marital Status</label>
                    <input required type="text" id="maritalstatus-field" name="maritalstatus" class="form-control" value="{{ $medicine->person->personInfo->maritalstatus }}"/>
                       @if($errors->has("maritalstatus"))
                        <span class="help-block">{{ $errors->first("maritalstatus") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Case Phone</label>
                    <input required type="text" id="phone-field" name="phone" class="form-control" value="{{ $medicine->person->personInfo->phone }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                <div class="form-group @if($errors->has('publishat')) has-error @endif">
                       <label for="publishat-field"> Case Publishat</label>
                    <input required type="text" id="publishat-field" name="publishat" class="form-control" value="{{ $medicine->person->publishat }}" disabled/>
                       @if($errors->has("publishat"))
                        <span class="help-block">{{ $errors->first("publishat") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                      <label for="interval_type_id_field">Interval Type </label>
                      <select required name="interval_type_id" id="interval_type_id_field">
                          @foreach ($interval_types as $key => $value)
                              <option value="{{ $key+1 }}">{{ $medicine->person->intervalType->type }}</option>
                          @endforeach
                      </select>
                    </div>

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Medicine Name</label>
                    <input required type="text" id="name-field" name="name" class="form-control" value="{{ $medicine->name }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('amount')) has-error @endif">
                       <label for="amount-field">Medicine Amount</label>
                    <input required type="text" id="amount-field" name="amount" class="form-control" value="{{ $medicine->amount }}"/>
                       @if($errors->has("amount"))
                        <span class="help-block">{{ $errors->first("amount") }}</span>
                       @endif
                    </div>
                     <div class="form-group">
                      <label for="case_doc_field">Case Documents</label>

                      @foreach($docs as $doc)
                      <br>
                        
                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/medicine/$doc->document") }}" alt="$doc->document" />
                        <br>
                        <br>
                        <label for="case_doc_field">Update Case Documents</label>
                        <br>
                        
                        <input type="file" id="case_doc_field" name="case_doc"  value="{{ old("case_doc") }}"/>
                         @if($errors->has("case_doc"))
                          <span class="help-block">{{ $errors->first("case_doc") }}</span>
                         @endif
                      @endforeach
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('medicines.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
