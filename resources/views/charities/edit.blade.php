@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="/Admin/vaild.js" type="text/javascript"></script>

    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> {{$charity->user->name}}</h1>
    </div>
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
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <fieldset style="border: 2px solid lightgray;padding: 20px;margin-bottom: 20px;">
            <legend>Charity Information</legend>
            <form action="{{ route('charities.update', $charity->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Name</label>
                    <input type="text" id="name-field" name="name" class="form-control" value="{{ $charity->user->name }}"/>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                </div>

                <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ $charity->user->email }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                </div>

                <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Phone</label>
                    <input type="text" id="phone-field" name="phone" class="form-control" value="{{ $charity->user->phone }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                </div>

                <div class="form-group @if($errors->has('taxnum')) has-error @endif">
                       <label for="taxnum-field">Taxnum</label>
                    <input type="text" id="taxnum-field" name="taxnum" class="form-control" value="{{ $charity->taxnum }}"/>
                       @if($errors->has("taxnum"))
                        <span class="help-block">{{ $errors->first("taxnum") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('Credit')) has-error @endif">
                       <label for="credit-field">Credit Number</label>
                    <input type="text" id="credit-field" name="credit" class="form-control" value="{{ $charity->credit }}"/>
                       @if($errors->has("credit"))
                        <span class="help-block">{{ $errors->first("credit") }}</span>
                       @endif
                    </div>

                    <div class="form-group">
                      <label for="governorate_id_field"> Governorate Name </label>
                      <select required name="governorate_id" id="governorate_id_field" class="form-control">
                          @foreach ($governorates as $key => $value)
                              @foreach($charity->charityAddress as $g)
                              @if($value["name"] == $g->governorate->name )
                                <option value="{{ $key+1 }}" selected>{{ $value["name"] }}</option>
                              @else
                                <option value="{{ $key+1 }}">{{ $value["name"] }}</option>
                              @endif
                               @endforeach
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="city_id_field"> City Name </label>
                      <select required name="city_id" id="citySelect" class="form-control">
                          @foreach($charity->charityAddress as $c)
                          <option value="{{$c->city_id}}">{{$c->city->name}}</option>
                          <option></option>
                          @endforeach
                      </select>
                    </div>

                     <div class="form-group @if($errors->has('publishdate')) has-error @endif">
                       <label for="publishdate-field">Address</label>
                       @foreach($charity->charityAddress as $d )
                    <input type="text" id="address-field" name="address" class="form-control" value="{{$d->address }}"/>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                       @endforeach
                    </div>

                    <div class="form-group @if($errors->has('publishdate')) has-error @endif">
                       <label for="publishdate-field">Date Of Publicity </label>
                    <input type="text" id="publishdate-field" name="publishdate" class="form-control" value="{{ $charity->publishdate }}"/>
                       @if($errors->has("publishdate"))
                        <span class="help-block">{{ $errors->first("publishdate") }}</span>
                       @endif
                    </div>

                     <div class="form-group">
                      <label  for="image_field">Charity Documents</label>
                      <hr style="border:1px solid white; margin-bottom:5px; margin-top:5px;">
                      
                        <div class="row">
                        <div class="col-md-4">
                        <label style="margin-bottom: 5px;" for="image_field">Document Description :</label>
                        <img style="width: 650px; height: 200px; margin-left: 50px; margin-bottom: 5px;" src="{{ asset("img/$d1->doc") }}" alt="{{$d1->doc}}"/>
                        
                        <label for="image_field">Update  Documents</label>
                        <input type="file" id="image_field" name="image1" value="{{ old("image") }}"/>
                        </div>
                        </div>
                        <br>

                        <div class="row">
                        <div class="col-md-4">
                        <label style="margin-bottom: 5px;" for="image_field">Document Description :</label>
                        <img style="width: 650px; height: 200px; margin-left: 50px; margin-bottom: 5px;" src="{{ asset("img/$d2->doc") }}" alt="{{$d2->doc}}"/>
                        
                        <label for="image_field">Update  Documents</label>
                        <input type="file" id="image_field" name="image2" value="{{ old("image") }}"/>
                        </div>
                        </div>
                        
                      
                    </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('charities.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            </form>
            </fieldset>
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
