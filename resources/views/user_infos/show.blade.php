@extends('layout')
@section('header')
<div class="page-header">
        <h1>UserInfos / Show #{{$user_info->id}}</h1>
        <form action="{{ route('user_infos.destroy', $user_info->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('user_infos.edit', $user_info->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">FIRSTNAME</label>
                     <p class="form-control-static">{{$user_info->firstName}}</p>
                </div>
                <div class="form-group">
                    <label for="nome">LASTNAME</label>
                     <p class="form-control-static">{{$user_info->lastName}}</p>
                </div>
                <div class="form-group">
                     <label for="nationalid">NATIONALID</label>
                     <p class="form-control-static">{{$user_info->nationalid}}</p>
                </div>
                <div class="form-group">
                     <label for="birthdate">BIRTHDATE</label>
                     <p class="form-control-static">{{$user_info->birthdate}}</p>
                </div>
                <div class="form-group">
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$user_info->address}}</p>
                </div>
                <div class="form-group">
                     <label for="birthdate">GOVERNORATE</label>
                     <p class="form-control-static">{{$gov->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="gender">CITY</label>
                     <p class="form-control-static">{{$city->name}}</p>
                </div>
                <div class="form-group">
                     <label for="gender">EMAIL</label>
                     <p class="form-control-static">{{$user->email}}</p>
                </div>
                <div class="form-group">
                     <label for="gender">PHONE</label>
                     <p class="form-control-static">{{$user->phone}}</p>
                </div>
                <div class="form-group">
                     <label for="gender">USERNAME</label>
                     <p class="form-control-static">{{$user->name}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="#"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection