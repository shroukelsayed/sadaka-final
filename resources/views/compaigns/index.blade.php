@extends('layouts.adminlayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Compaigns
            <a class="btn btn-success pull-right" href="{{ route('compaigns.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($compaigns->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITLE</th>
                        <th>LOCATION</th>
                        <th>STARTDATE</th>
                        <th>ENDDATE</th>
                        <th>BUDGET</th>
                        <th>DESCRIPTION</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($compaigns as $compaign)
                            <tr>
                                <td>{{$compaign->id}}</td>
                                <td>{{$compaign->title}}</td>
                                <td>{{$compaign->location}}</td>
                                <td>{{$compaign->startdate}}</td>
                                <td>{{$compaign->enddate}}</td>
                                <td>{{$compaign->budget}}</td>
                                <td>{{$compaign->description}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('compaigns.show', $compaign->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('compaigns.edit', $compaign->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('compaigns.destroy', $compaign->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $compaigns->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection