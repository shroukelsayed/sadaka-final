@extends('layouts.adminlayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> People
            <a class="btn btn-success pull-right" href="{{ route('people.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
      <div class="row">
        <div class="col-md-12">
            @if($personinfo->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Marital Status</th>
                            <th>Donation Type</th>
                            <th>Publish At</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                             @foreach ($personinfo as $one)
                            <tr>
                                <td>{{$one->name}}</td>
                                <td>{{$one->address}}</td>
                                <td>{{$one->maritalstatus}}</td>
                                @foreach ($one->people as $p)
                                <td>{{$p->donationType->type}}</td> 
                                <td>{{$p->publishat}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('people.show', $one->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('people.edit', $one->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('people.destroy', $one->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                                @endforeach 
                            </tr>
                             @endforeach            
                    </tbody>
                </table>
               
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection