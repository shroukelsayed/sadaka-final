@extends(( (isset(Auth::user()->id) and Auth::user()->user_type_id ) == 2 or ( isset(Auth::user()->id) and Auth::user()->user_type_id == 3 )) ? 'layouts.adminlayout' : 'layout')
@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Bloods
            <a class="btn btn-success pull-right" href="{{ route('bloods.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($bloods->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>BLOODTYPE</th>
                        <th>AMOUNT</th>
                        <th>HOSPITAL</th>
                        <th>ADDRESS</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($bloods as $blood)
                            <tr>
                                <td>{{$blood->id}}</td>
                                <td>{{$blood->bloodtype}}</td>
                    <td>{{$blood->amount}}</td>
                    <td>{{$blood->hospital}}</td>
                    <td>{{$blood->address}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('bloods.show', $blood->id) }}"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('bloods.edit', $blood->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="{{ route('bloods.destroy', $blood->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $bloods->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection