@extends('layouts.adminlayout')
@section('header')
<div class="page-header">
        <h1>PersonInfos / Show #{{$person_info->id}}</h1>
        <form action="{{ route('person_infos.destroy', $person_info->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('person_infos.edit', $person_info->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static">{{$person_info->id}}</p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$person_info->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$person_info->address}}</p>
                </div>
                    <div class="form-group">
                     <label for="birthdate">BIRTHDATE</label>
                     <p class="form-control-static">{{$person_info->birthdate}}</p>
                </div>
                    <div class="form-group">
                     <label for="gender">GENDER</label>
                     <p class="form-control-static">{{$person_info->gender}}</p>
                </div>
                    <div class="form-group">
                     <label for="maritalstatus">MARITALSTATUS</label>
                     <p class="form-control-static">{{$person_info->maritalstatus}}</p>
                </div>
                    <div class="form-group">
                     <label for="phone">PHONE</label>
                     <p class="form-control-static">{{$person_info->phone}}</p>
                </div>
                     <div class="form-group">
                     <label for="Donation Type">Donation Type</label>
                     
                     @foreach($person_info->people as $p)
                         <p class="form-control-static">
                            {{$p->donationType->type}}</p>
                     @endforeach
                </div> 

               
                     <div class="form-group">
                     <label for="Amount">Blood Type</label>
                     
                     @foreach($person_info->people as $b)
                         <p class="form-control-static">
                            {{$b->blood->bloodtype}}</p>
                     @endforeach
                </div>  
            </form>

            <a class="btn btn-link" href="{{ route('person_infos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection