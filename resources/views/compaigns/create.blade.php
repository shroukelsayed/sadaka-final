@extends('layouts.adminlayout')
@section('css')
 
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Compaigns / Create </h1>
    </div>
   
    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
   
    <style>
      
    select{

        width:400px;
        height:30px;

    }

    </style>

    <script>
      
      $(document).ready(function(){  

      $("#enddate-field").change(function () {
          var startDate = document.getElementById("startdate-field").value;
          var endDate = document.getElementById("enddate-field").value;
          if ((Date.parse(startDate) >= Date.parse(endDate))) {
              alert("End date should be greater than Start date");
              document.getElementById("enddate-field").value = "";
          }
      });

   });   

    </script>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('compaigns.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">Title</label>
                    <input type="text" id="title-field" name="title" class="form-control" value="{{ old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                       <label for="location-field">Location</label>
                    <textarea class="form-control" id="location-field" rows="3" name="location">{{ old("location") }}</textarea>
                       @if($errors->has("location"))
                        <span class="help-block">{{ $errors->first("location") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('startdate')) has-error @endif">
                       <label for="startdate-field">Startdate</label>
                    <input  type="date" id="startdate-field" name="startdate" class="form-control" value="{{ old("startdate") }}"/>
                       @if($errors->has("startdate"))
                        <span class="help-block">{{ $errors->first("startdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('enddate')) has-error @endif">
                       <label for="enddate-field">Enddate</label>
                    <input type="date" id="enddate-field" name="enddate" class="form-control" value="{{ old("enddate") }}"/>
                       @if($errors->has("enddate"))
                        <span class="help-block">{{ $errors->first("enddate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('budget')) has-error @endif">
                       <label for="budget-field">Budget</label>
                    <input type="text" id="budget-field" name="budget" class="form-control" value="{{ old("budget") }}"/>
                       @if($errors->has("budget"))
                        <span class="help-block">{{ $errors->first("budget") }}</span>
                       @endif
                    </div>

                    <div class="form-group">
                      <label for="amount">Governrate </label>
                      <br>
                      <select name="governrate" id="GovernrateSelect">
                          @foreach ($governrates as $key => $value)
                              <option value="{{ $key+1 }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="amount">City </label>
                      <br>
                      <select name="city" id="citySelect">
                          @foreach ($city as $key => $value)
                              <option value=""></option>
                          @endforeach
                      </select>
                    </div>
                   

                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea class="form-control" id="description-field" rows="3" name="description">{{ old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('compaigns.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
                
            </form>

        </div>
    </div>
@endsection
@section('scripts')
 
@endsection
