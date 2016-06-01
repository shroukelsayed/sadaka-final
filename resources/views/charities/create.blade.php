@extends('layouts.adminlayout')

@section('header')
 

    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Charities / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('charities.store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('taxnum')) has-error @endif">
                       <label for="taxnum-field">Taxnum</label>
                    <input type="text" id="taxnum-field" name="taxnum" class="form-control" value="{{ old("taxnum") }}"/>
                       @if($errors->has("taxnum"))
                        <span class="help-block">{{ $errors->first("taxnum") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('publishdate')) has-error @endif">
                       <label for="publishdate-field">Publishdate</label>
                    <input type="text" id="publishdate-field" name="publishdate" class="form-control" value="{{ old("publishdate") }}"/>
                       @if($errors->has("publishdate"))
                        <span class="help-block">{{ $errors->first("publishdate") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('charities.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection
