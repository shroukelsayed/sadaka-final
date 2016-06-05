@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> UserInfos / Edit #{{$user_info->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('user_infos.update', $user_info->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('nationalid')) has-error @endif">
                       <label for="nationalid-field">Nationalid</label>
                    <input type="text" id="nationalid-field" name="nationalid" class="form-control" value="{{ $user_info->nationalid }}"/>
                       @if($errors->has("nationalid"))
                        <span class="help-block">{{ $errors->first("nationalid") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('firstName')) has-error @endif">
                       <label for="firstName-field">FirstName</label>
                    <textarea class="form-control" id="firstName-field" rows="3" name="firstName">{{ $user_info->firstName }}</textarea>
                       @if($errors->has("firstName"))
                        <span class="help-block">{{ $errors->first("firstName") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('lastName')) has-error @endif">
                       <label for="lastName-field">LastName</label>
                    <textarea class="form-control" id="lastName-field" rows="3" name="lastName">{{ $user_info->lastName }}</textarea>
                       @if($errors->has("lastName"))
                        <span class="help-block">{{ $errors->last("lastName") }}</span>
                       @endif
                    </div>

                    <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <textarea class="form-control" id="address-field" rows="3" name="address">{{ $user_info->address }}</textarea>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="cityname-field">City</label>
                    <textarea class="form-control" id="cityname-field" rows="3" name="cityname">{{ $city->name }}</textarea>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                       <label for="birthdate-field">Birthdate</label>
                    <input type="text" id="birthdate-field" name="birthdate" class="form-control" value="{{ $user_info->birthdate }}"/>
                       @if($errors->has("birthdate"))
                        <span class="help-block">{{ $errors->first("birthdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email-field" name="email" class="form-control" value="{{ $user->email }}"/>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Phone</label>
                    <input type="text" id="phone-field" name="phone" class="form-control" value="{{ $user->phone }}"/>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('username')) has-error @endif">
                       <label for="username-field">username</label>
                    <input type="text" id="username-field" name="username" class="form-control" value="{{ $user->name }}"/>
                       @if($errors->has("username"))
                        <span class="help-block">{{ $errors->first("username") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('user_infos.show', $user_info->id) }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
