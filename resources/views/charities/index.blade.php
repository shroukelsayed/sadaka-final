@extends('layouts.adminlayout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Charities
            <a class="btn btn-success pull-right" href="{{ route('charities.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
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
                            <th>ID</th>
                            <th>Publish At</th>
                            <th>Donaite Type</th>
                            
                        <!-- <th>PUBLISHDATE</th> -->
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                      
                            <tr>
                                <td>{{$personinfo->id}}</td>
                              @foreach($personinfo->people as $p)
                                <td>{{$p->publishat }}</td>
                                
                               @endforeach 
                                
                                
                                
                            </tr>
                       
                    </tbody>
                </table>
                
                
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection