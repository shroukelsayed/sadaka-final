@extends('layouts.adminlayout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> Compaigns / Edit #{{$compaign->id}}</h1>
    </div>


<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>

<script src="/Admin/datepiker.js" type="text/javascript"></script>

<script src="/Admin/vaild.js" type="text/javascript"></script>


@endsection

@section('content')
@include('error')





    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('compaigns.update', $compaign->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">Title</label>
                    <input required type="text" id="title" name="title" class="form-control" value="{{ $compaign->title }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                       <label for="location-field">Location</label>
                    <textarea required class="form-control" id="location" rows="3" name="location">{{ $compaign->location }}</textarea>
                       @if($errors->has("location"))
                        <span class="help-block">{{ $errors->first("location") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('startdate')) has-error @endif">
                       <label for="startdate-field">Startdate</label>
                    <input required type="text" id="startdate" name="startdate" class="form-control" value="{{ $compaign->startdate }}"/>
                       @if($errors->has("startDate"))
                        <span class="help-block">{{ $errors->first("startdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('enddate')) has-error @endif">
                       <label for="enddate-field">Enddate</label>
                    <input required type="text" id="enddate" name="enddate" class="form-control" value="{{ $compaign->enddate }}"/>
                       @if($errors->has("enddate"))
                        <span class="help-block">{{ $errors->first("enddate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('budget')) has-error @endif">
                       <label for="budget-field">Budget</label>
                    <input required type="text" id="budget" name="budget" class="form-control" value="{{ $compaign->budget }}"/>
                       @if($errors->has("budget"))
                        <span class="help-block">{{ $errors->first("budget") }}</span>
                       @endif
                    </div>

                    <div class="form-group">
                      <label for="governorate_id_field"> Governorate  </label>
                      <select required name="governorate" id="governorate" class="form-control">
                          @foreach ($governrates as $key => $value)
                              @if($value["name"] == $compaign->governorate->name )
                                <option value="{{ $key+1 }}" selected>{{ $value["name"] }}</option>
                              @else
                                <option value="{{ $key+1 }}">{{ $value["name"] }}</option>
                              @endif
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="city_id_field">City</label>
                      <select required name="city_id" id="city" class="form-control">
                          <option value="{{$compaign->city->id}}">{{$compaign->city->name}}</option>
                          <option></option>
                      </select>
                    </div>


                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description">Description</label>
                    <textarea required class="form-control" id="description-field" rows="3" name="description">{{ $compaign->description }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>

                    <div class="form-group">
                      <label for="image">Image</label>
                        <br>
                        <img style="width: 200px; height: 200px;" src="{{ asset("compagin/$compaign->image") }}" alt="" />
                        <br>
                        <br>
                        <label for="image">Update Image</label>
                        <br>
                        
                        <input type="file" id="imgdosc" class="fancybox" name="image"  value="{{ old("image") }}"/>
                         @if($errors->has("image"))
                          <span class="help-block">{{ $errors->first("image") }}</span>
                         @endif
                      
                    </div>


                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('compaigns.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
