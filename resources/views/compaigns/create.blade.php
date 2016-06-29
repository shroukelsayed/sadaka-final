@extends('layouts.adminlayout')
@section('css')


@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Compaigns / Create </h1>
    </div>
    
    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>

    <script src="/Admin/datepiker.js" type="text/javascript"></script>
      
    <script src="/Admin/vaild.js" type="text/javascript"></script>



@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('compaigns.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('title')) has-error @endif">
                       <label for="title-field">Title</label>
                    <input required type="text" id="title" name="title" class="form-control" value="{{ old("title") }}"/>
                       @if($errors->has("title"))
                        <span class="help-block">{{ $errors->first("title") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('location')) has-error @endif">
                       <label for="location-field">Location</label>
                    <textarea required class="form-control" id="location" rows="3" name="location">{{ old("location") }}</textarea>
                       @if($errors->has("location"))
                        <span class="help-block">{{ $errors->first("location") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('startdate')) has-error @endif">
                       <label for="startdate-field">Startdate</label>
                    <input required type="text" id="startdate" name="startdate" class="form-control" value="{{ old("startdate") }}"/>
                       @if($errors->has("startdate"))
                        <span class="help-block">{{ $errors->first("startdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('enddate')) has-error @endif">
                       <label for="enddate-field">Enddate</label>
                    <input required type="text" id="enddate" name="enddate" class="form-control" value="{{ old("enddate") }}"/>
                       @if($errors->has("enddate"))
                        <span class="help-block">{{ $errors->first("enddate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('budget')) has-error @endif">
                       <label for="budget-field">Budget</label>
                    <input required type="text" id="budget" name="budget" class="form-control" value="{{ old("budget") }}"/>
                       @if($errors->has("budget"))
                        <span class="help-block">{{ $errors->first("budget") }}</span>
                       @endif
                    </div>

                    <div class="form-group">
                      <label for="amount">Governrate </label>
                      <br>
                      <select required name="governorate" id="governorate" class="form-control">
                          <option value="" >Select</option>
                          @foreach ($governrates as $governrate)
                            <option value="{{$governrate->id}}">
                                {{$governrate->name}}
                            </option>

                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="amount">City </label>
                      <br>
                      <select required name="city" id="city" class="form-control">

                      </select>
                    </div>
                   

                    <div class="form-group @if($errors->has('description')) has-error @endif">
                       <label for="description-field">Description</label>
                    <textarea required class="form-control" id="description" rows="3" name="description">{{ old("description") }}</textarea>
                       @if($errors->has("description"))
                        <span class="help-block">{{ $errors->first("description") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('image')) has-error @endif">
                       <label for="image-field">Image</label>
                      <input type="file" id="image" name="image" class="form-control" value="{{ old("image") }}" required/>
                       @if($errors->has("image"))
                        <span class="help-block">{{ $errors->first("image") }}</span>
                       @endif
                    </div>


                    <br>
                <div class="well well-sm">
                    <button id="submit" type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('compaigns.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
                
            </form>

        </div>
    </div>
@endsection
@section('scripts')
 
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
