@extends('layouts.adminlayout')
@section('header')
<div class="page-header">
        <h1>Compaigns / Show #{{$compaign->id}}</h1>
        <form action="{{ route('compaigns.destroy', $compaign->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('compaigns.edit', $compaign->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>

    <style>
        
        select{

            width:150px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$compaign->id}}</p>
                </div>
                <div class="form-group">
                     <label for="title">TITLE</label>
                     <p class="form-control-static">{{$compaign->title}}</p>
                </div>
                <div class="form-group">
                     <label for="location">LOCATION</label>
                     <p class="form-control-static">{{$compaign->location}}</p>
                </div>
                <div class="form-group">
                     <label for="startdate">STARTDATE</label>
                     <p class="form-control-static">{{$compaign->startdate}}</p>
                    </div>
                    <div class="form-group">
                     <label for="enddate">ENDDATE</label>
                     <p class="form-control-static">{{$compaign->enddate}}</p>
                    </div>
                    <div class="form-group">
                     <label for="budget">BUDGET</label>
                     <p class="form-control-static">{{$compaign->budget}}</p>
                    </div>

                     <div class="form-group">
                      <label for="amount">Governrate </label>
                      <br>
                      <select disabled name="governrate" id="modify_modal_level">
                      <option>{{ $compaign->governorate->name }}</option>  
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="amount">City </label>
                      <br>
                      <select disabled name="city" id="modify_modal_level"> 
                          <option>{{ $compaign->city->name }}</option>
                      </select>
                    </div>
                
                    
                    <div class="form-group">
                     <label for="description">DESCRIPTION</label>
                     <p class="form-control-static">{{$compaign->description}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('compaigns.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection