@extends('layouts.layout')
@section('header')
<div class="page-header">
        <h1>Hello {{$user->name}}</h1>
        <form action="{{ route('user_infos.destroy', $user_info->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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
            <table cellspacing="1" id="table">
            <tr >
                <td><label for="nome">FIRSTNAME</label>
                <p class="form-control-static">{{$user_info->firstName}}</p>
                </td>
                <td>
                  <label for="nome">LASTNAME</label>
                     <p class="form-control-static">{{$user_info->lastName}}</p>  
                </td>
                </tr>
                <tr>
                <td>
                <label for="nationalid">NATIONALID</label>
                     <p class="form-control-static">{{$user_info->nationalid}}</p>
                </td>
                <td>
                  <label for="birthdate">BIRTHDATE</label>
                     <p class="form-control-static">{{$user_info->birthdate}}</p>
                </td>
                </tr>
                <tr><td>
               <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$user_info->address}}</p>
                </td>
                <td>
                   <label for="birthdate">PHONE</label>
                     <p class="form-control-static">{{$user->phone}}</p> 
                </td>
                </tr>
                 <tr>
                 <td>
                    <label for="gender">GOVERNORATE</label>
                    <p class="form-control-static">{{$gov->name}}</p>
                </td>
                <td>
                    <label for="gender">CITY</label>
                    <p class="form-control-static">{{$city->name}}</p>
                </td>
                </tr>
                <tr>
                 <td>
                   <label for="gender">EMAIL</label>
                     <p class="form-control-static">{{$user->email}}</p>
                </td>
                <td>
                    <label for="gender">USERNAME</label>
                     <p class="form-control-static">{{$user->name}}</p>
                </td>
                </tr>
                
            </table>

            </form>

        </div>
    </div>

@endsection        