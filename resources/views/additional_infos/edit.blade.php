@extends('layout')
@section('css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> AdditionalInfos / Edit #{{$additional_info->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('additional_infos.update', $additional_info->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group @if($errors->has('firsttime')) has-error @endif">
                       <label for="firsttime-field">Firsttime</label>
                    <input type="text" id="firsttime-field" name="firsttime" class="form-control" value="{{ $additional_info->firsttime }}"/>
                       @if($errors->has("firsttime"))
                        <span class="help-block">{{ $errors->first("firsttime") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('nexttime')) has-error @endif">
                       <label for="nexttime-field">Nexttime</label>
                    <input type="text" id="nexttime-field" name="nexttime" class="form-control" value="{{ $additional_info->nexttime }}"/>
                       @if($errors->has("nexttime"))
                        <span class="help-block">{{ $errors->first("nexttime") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('ramainingtime')) has-error @endif">
                       <label for="ramainingtime-field">Ramainingtime</label>
                    <input type="text" id="ramainingtime-field" name="ramainingtime" class="form-control" value="{{ $additional_info->ramainingtime }}"/>
                       @if($errors->has("ramainingtime"))
                        <span class="help-block">{{ $errors->first("ramainingtime") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('additional_infos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
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
