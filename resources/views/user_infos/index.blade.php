@extends('layout')

@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> UserInfos
            <a class="btn btn-success pull-right" href="{{ route('user_infos.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($user_infos->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NATIONALID</th>
                        <th>ADDRESS</th>
                        <th>BIRTHDATE</th>
                        <th>GENDER</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($user_infos as $user_info)
                            <tr>
                                <td>{{$user_info->id}}</td>
                                <td>{{$user_info->nationalid}}</td>
                    <td>{{$user_info->address}}</td>
                    <td>{{$user_info->birthdate}}</td>
                    <td>{{$user_info->gender}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('user_infos.show', $user_info->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('user_infos.edit', $user_info->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('user_infos.destroy', $user_info->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $user_infos->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection