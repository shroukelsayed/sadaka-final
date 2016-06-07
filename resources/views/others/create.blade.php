@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/Admin/form.css">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Others / Create </h1>
    </div>
    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
    <script src="/Admin/form.js"></script>

@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">
          <div class="container" style="width: 900px;height: 900px;">
                
            <div class="stepwizard" >
            <div class="stepwizard-row setup-panel">
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Service Details</p>
              </div>
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Service Enpoint Details</p>
              </div>  
            </div>
          </div>
          <form action="{{ route('others.store') }}" method="POST" enctype="multipart/form-data">
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
                      <label for="interval_type_id_field">Interval Type </label>
                      <select required name="interval_type_id" id="interval_type_id_field" class="form-control">
                          @foreach ($interval_types as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['type'] }}</option>
                          @endforeach
                      </select>
                    </div>  

                <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Case Description</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <textarea required class="form-control" id="description-field" rows="3" name="description">{{ old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>
                    <div class="form-group">
                    <label for="case_doc_field">Case Documents</label>
                    <span style="color:red; margin-left: 10px;">*</span>
                    <input type="file" id="case_doc_field" name="case_doc" required value="{{ old("case_doc") }}"/>
                       @if($errors->has("case_doc"))
                        <span class="help-block">{{ $errors->first("case_doc") }}</span>
                       @endif
                    </div>


    <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('others.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
</form>
</div>

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
