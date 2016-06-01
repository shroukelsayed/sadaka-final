@extends('layout')
@section('header')
<div class="page-header">
        <h1>CompaignDonateTypes / Show #{{$compaign_donate_type->id}}</h1>
        <form action="{{ route('compaign_donate_types.destroy', $compaign_donate_type->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('compaign_donate_types.edit', $compaign_donate_type->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="type">TYPE</label>
                     <p class="form-control-static">{{$compaign_donate_type->type}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('compaign_donate_types.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection