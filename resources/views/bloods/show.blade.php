@extends('layout')
@section('header')
<div class="page-header">
        <h1>Bloods / Show #{{$blood->id}}</h1>
        <form action="{{ route('bloods.destroy', $blood->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('bloods.edit', $blood->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                     <label for="bloodtype">BLOODTYPE</label>
                     <p class="form-control-static">{{$blood->bloodtype}}</p>
                </div>
                    <div class="form-group">
                     <label for="amount">AMOUNT</label>
                     <p class="form-control-static">{{$blood->amount}}</p>
                </div>
                    <div class="form-group">
                     <label for="hospital">HOSPITAL</label>
                     <p class="form-control-static">{{$blood->hospital}}</p>
                </div>
                    <div class="form-group">
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$blood->address}}</p>
                </div>
            </form>

            <a class="btn btn-link" href="{{ route('bloods.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection