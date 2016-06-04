@extends('layout')
@section('header')
<div class="page-header">
        <h1>Money / Show #{{$money->id}}</h1>
        <form action="{{ route('money.destroy', $money->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="{{ route('money.edit', $money->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                    <p class="form-control-static">{{$money->person->personInfo->id}}</p>
                </div>
                <div class="form-group">
                     <label for="name">NAME</label>
                     <p class="form-control-static">{{$money->person->personInfo->name}}</p>
                </div>
                    <div class="form-group">
                     <label for="address">ADDRESS</label>
                     <p class="form-control-static">{{$money->person->personInfo->address}}</p>
                </div>
                    <div class="form-group">
                     <label for="birthdate">BIRTHDATE</label>
                     <p class="form-control-static">{{$money->person->personInfo->birthdate}}</p>
                </div>
                    <div class="form-group">
                     <label for="gender">GENDER</label>
                     <p class="form-control-static">{{$money->person->personInfo->gender}}</p>
                </div>
                    <div class="form-group">
                     <label for="maritalstatus">MARITALSTATUS</label>
                     <p class="form-control-static">{{$money->person->personInfo->maritalstatus}}</p>
                </div>
                    <div class="form-group">
                     <label for="phone">PHONE</label>
                     <p class="form-control-static">{{$money->person->personInfo->phone}}</p>
                </div>
                     <div class="form-group">
                     <label for="Donation Type">Donation Type</label>
                     <p class="form-control-static">
                        {{$money->person->donationType->type}}
                     </p>
                </div> 
                <div class="form-group">
                     <label for="Donation Type">Case Interval</label>
                     <p class="form-control-static">
                        {{$money->person->intervalType->type}}
                     </p>
                </div>

                     <div class="form-group">
                     <label for="Amount">Amount</label>
                         <p class="form-control-static">
                            {{$money->amount}} .LE</p>
                </div>  
                <div class="form-group">
                    
                      <label for="case_doc_field">Case Documents</label>
                      <br>
                      @foreach($money->person->personDocs as $doc)

                        <img style="width: 200px; height: 200px;" src="{{ asset("Case/PersonDocument/money/$doc->document") }}" alt="$doc->document" />
                        <br><br>
                        <label for="case_doc_field">Update Case Documents</label>
                        <input type="file" id="case_doc_field" name="case_doc"  value="{{ old("case_doc") }}"/>
                         @if($errors->has("case_doc"))
                          <span class="help-block">{{ $errors->first("case_doc") }}</span>
                         @endif
                      @endforeach
                    </div>  
            </form>

            <a class="btn btn-link" href="{{ route('person_infos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>


@endsection