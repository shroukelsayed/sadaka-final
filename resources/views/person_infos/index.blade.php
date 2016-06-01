@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> PersonInfos
            <a class="btn btn-success pull-right" href="{{ route('person_infos.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($person_infos->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                        <th>ADDRESS</th>
                        <th>BIRTHDATE</th>
                        <th>GENDER</th>
                        <th>MARITALSTATUS</th>
                        <th>PHONE</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($person_infos as $person_info)
                            <tr>
                                <td>{{$person_info->id}}</td>
                                <td>{{$person_info->name}}</td>
                    <td>{{$person_info->address}}</td>
                    <td>{{$person_info->birthdate}}</td>
                    <td>{{$person_info->gender}}</td>
                    <td>{{$person_info->maritalstatus}}</td>
                    <td>{{$person_info->phone}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('person_infos.show', $person_info->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('person_infos.edit', $person_info->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('person_infos.destroy', $person_info->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $person_infos->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection